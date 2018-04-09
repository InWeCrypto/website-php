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
    public function httpReq($url = '')
    {
        $url = $url ? $url . '?' . Request::getQueryString() : str_replace('/'.$this->lang.'/', '', Request::getRequestUri());
        $url = env('INWE_URL') . $url ;

        $header = [
            'lang' => $this->lang
        ];

        $res = HttpReq::url($url)->header($header)->request();
        if ($res['code'] != '4000') {
            abort(401);
        }

        return $res['data'];
    }
}
