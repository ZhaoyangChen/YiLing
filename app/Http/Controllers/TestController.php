<?phpnamespace App\Http\Controllers;use App\Keyword;use App\Lib\Proxy;use App\Lib\Spider;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Redis;use PHPHtmlParser\Dom;class TestController extends Controller{	public function test() {		for($i = 0 ;$i < 10; $i++) {			\Log::info($i);			\Log::info(Spider::getKeywordRank('衡阳个人小额贷款'));		}	}}