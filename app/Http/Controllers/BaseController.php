<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as HttpRequest;
use \Request;

use \HttpReq;

/**
 * Class BaseController
 * @package App\Http\Controllers\Back
 */
class BaseController extends Controller
{
    public $lang = 'zh';
    public function __construct(){
        $this->lang = \App::getLocale();
    }
    public function httpReq($url = '', $params = [])
    {
        if(!$url){
            $url = str_replace('/'.$this->lang.'/', '', Request::getRequestUri());
        }else{
            parse_str(Request::getQueryString(), $querys);
            $params = array_merge($querys, $params);
            $url .= '?' . http_build_query($params);
        }
        $url = env('INWE_URL') . $url;

        $header = [
            'lang' => $this->lang
        ];

        $res = HttpReq::url($url)->header($header)->request();

        if (empty($res['code']) || $res['code'] != '4000') {
            abort(401);
        }

        return $res['data'];
    }
}
