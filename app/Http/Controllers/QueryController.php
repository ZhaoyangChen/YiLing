<?phpnamespace App\Http\Controllers;use Illuminate\Http\Request;use App\Keyword;class QueryController extends Controller{	private static $steps = 20;	public static function guide(Request $req, $model) {		return call_user_func_array("self::{$model}Query", [$req->get('condition'), $req->get('curPage')]);	}	public static function keywordQuery($condition, $curPage) {		$conditionMap = [			'按热词'   =>  'name',			'按PC端URL'   =>  'PCUrl',			'按PC端排名'    =>  'PCRank',			'按PC端爬取状态'  =>  'PCSpiderStatus',			'按移动端URL'   =>  'mobileUrl',			'按移动端排名'    =>  'mobileRank',			'按移动端爬取状态'  =>  'mobileSpiderStatus',			'按创建者'  =>  'author',			'按创建时间' =>  'created_at',			'按最近更新时间'   =>  'updated_at',		];		$symbolMap = [			'模糊等于'    =>  '=',			'精确等于'    =>  '==',			'大于'    =>  '>',			'小于'    =>  '<',		];		if ($condition['field']) {			switch($symbolMap[$condition['symbol']]) {				case '==':					$res = Keyword::where($conditionMap[$condition['field']],'=', $condition['input']);					break;				case '>':					$res = Keyword::where($conditionMap[$condition['field']],'>', $condition['input']);					break;				case '<':					$res = Keyword::where($conditionMap[$condition['field']],'<', $condition['input']);					break;				case '=':				default:					$res = Keyword::where($conditionMap[$condition['field']],'like', "%{$condition['input']}%");					break;			}		} else {			$res = Keyword::where(null);		}		$totalNum = $res->count();		return response()->json([			'data'      =>  $res->skip(($curPage - 1) * self::$steps)->take(self::$steps)->get(),			'totalNum'  =>  $totalNum,			'totalPage' =>  ceil($totalNum/self::$steps),			'curPage'   =>  $curPage		]);	}}