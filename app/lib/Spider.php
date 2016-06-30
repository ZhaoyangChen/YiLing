<?phpnamespace App\Lib;use App\Http\Controllers\SpiderController;use App\Keyword;use PHPHtmlParser\Dom;use Illuminate\Support\Facades\Redis;include('simple_html_dom.php');const RANK_UNDEFINED = -1;const RANK_OUTOFRANGE = -2;class Spider {	protected static $try = 0;	public static function weave($insect) {		foreach ($insect as $keyword) {			if (SpiderController::status() == '1') {				$keyword = Keyword::find($keyword);				$PCRank = self::getKeywordRank(str_replace(' ', '+', $keyword->name));				$mobileRank = self::getKeywordMobileRank(str_replace(' ', '+', $keyword->name));				$keyword->PCRank = $PCRank['PC'][0];				$keyword->PCUrl = $PCRank['PC'][1];				$keyword->PCSEMRank = $PCRank['SEM'][0];				$keyword->PCSEMUrl = $PCRank['SEM'][1];				$keyword->mobileRank = $mobileRank['Mobile'][0];				$keyword->mobileUrl = $mobileRank['Mobile'][1];				$keyword->mobileSEMRank = $mobileRank['SEM'][0];				$keyword->mobileSEMUrl = $mobileRank['SEM'][1];				try {					$keyword->update();				} catch(\Exception $e) {					\Log::info($keyword->name);					continue;				}			} else {				break;			}		}	}	public static function getKeywordRank($keyword) {		if (mb_detect_encoding($keyword, "UTF-8, GBK")=="UTF-8" ) {			$keyword=iconv("utf-8","gb2312//IGNORE",$keyword);		}		$url = "http://www.baidu.com/s?wd={$keyword}&rn=50";		try {			$opts = array(				'http'=>array(//					'proxy' => 'tcp://' . \App\Lib\Proxy::getIP(),//					'request_fulluri' => true,					'timeout' => 5,				)			);			$context = stream_context_create($opts);			self::$try++;			sleep(1);			$html = file_get_html($url, false, $context);		} catch(\Exception $e) {			if (self::$try <= 3) {				return self::getKeywordRank($keyword);			} else {				\Log::info(' PC Spider get html fail '.$url. ' '. $e->getMessage());				$html = null;			}		}		$rank = [			'PC'    =>  [RANK_UNDEFINED, ''],			'SEM'   =>  [RANK_UNDEFINED, '']		];		self::$try = 0;		if ($html) {			$targetLinks = $html->find('h3 > a');			$semNum = count($html->find('font > a > span'));			foreach ($targetLinks as $index => $res) {				$finalLink = self::getRedirectUrl(html_entity_decode($res->href));				if (strpos($finalLink, 'baixing.com') !== false) {					if ($index < $semNum) {						if ($rank['SEM'][0] == RANK_UNDEFINED) {							$rank['SEM'][0] = (int)$index + 1;							$rank['SEM'][1] = $finalLink;						}					} else {						$rank['PC'][0] = (int)$index + 1 - $semNum;						$rank['PC'][1] = $finalLink;						break;					}				}			}			return self::OutOfRangeHandle($rank);		} else {			return $rank;		}	}	public static function getKeywordMobileRank ($keyword, $page = 1, $rank = [			'Mobile'    =>  [RANK_UNDEFINED, ''],			'SEM'       =>  [RANK_UNDEFINED, '']		]	) {		if (mb_detect_encoding($keyword, "UTF-8, GBK")=="UTF-8" ) {			$keyword=iconv("utf-8","gb2312//IGNORE",$keyword);		}		$pageIndex = ($page-1) * 10;		$url = "https://m.baidu.com/from=844b/s?word={$keyword}&pn={$pageIndex}";		$opts = array(			'http'=>array(				'header'=>"Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1"			)		);		$context = stream_context_create($opts);		$html = file_get_html($url, false, $context);		if ($html) {			if ($rank['SEM'][0] == RANK_UNDEFINED) {				$semLinks = $html->find('.ec_title');				if (!empty($semLinks)) {					foreach ($semLinks as $i => $s) {						$finalLink = self::getRedirectUrl(html_entity_decode($s->href));						if (strpos($finalLink, 'baixing.com') !== false) {							$rank['SEM'][0] = (int)$i + 1 +$pageIndex;							$rank['SEM'][1] = $finalLink;							break;						}					}				}			}			$normalResults = $html->find('.c-result');			if (!empty($normalResults)) {				foreach ($normalResults as $i => $s) {					$attrs = $s->getAllAttributes();					if (isset($attrs['data-log'])) {						preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $attrs['data-log'], $match);						if (is_string($match)) {							$finalLink = $match;						} else {							$finalLink = isset($match[0][0]) ? $match[0][0] : '';						}						if (strpos($finalLink, 'baixing.com') !== false) {							$rank['Mobile'][0] = (int)$i + 1 + $pageIndex;							$rank['Mobile'][1] = $finalLink;							break;						}					}				}			}			if ($rank['Mobile'][0] == RANK_UNDEFINED && $page < 5) {				return self::getKeywordMobileRank($keyword, $page + 1, $rank);			} else {				return self::OutOfRangeHandle($rank);			}		} else {			return $rank;		}	}	protected static function OutOfRangeHandle($rank) {		foreach ($rank as $i => $r) {			if ($r[0] == RANK_UNDEFINED) {				$rank[$i][0] = RANK_OUTOFRANGE;			}		}		return $rank;	}	public static function getRedirectUrl ($url) {		if ($url == '' || $url == '#') {			return '';		}		try {			stream_context_set_default(				array(					'http' => array(						'method' => 'HEAD',					)				)			);			$headers = get_headers($url, 1);		} catch(\Exception $e) {			// 出错尝试使用代理			try {				stream_context_set_default(					array(						'http' => array(							'method' => 'HEAD',							'proxy' => 'tcp://' . Proxy::getIP(),							'request_fulluri' => true,						)					)				);				$headers = get_headers($url, 1);			}catch(\Exception $e) {				//\Log::info('代理依然失败: '.$url);				return $url;			}		}		$res = isset($headers['Location']) ? $headers['Location'] : $url ;		if (is_array($res)) {			$res = $res[0];		}		return $res;	}	public static function spiderQueueStatus() {		$redis = Redis::connection();		$res = $redis->get('spiderQueue');		if ($res == null || intval($res) < 0) {			$redis->set('spiderQueue', '0');		}		return $redis->get('spiderQueue');	}	public static function spiderQueuePlus() {		$redis = Redis::connection();		$redis->incr('spiderQueue');	}	public static function spiderQueueMinus() {		$redis = Redis::connection();		$redis->decr('spiderQueue');	}}