<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use \HttpReq;

class RedbagController extends BaseController
{
    public $uri = 'redbag/detail';

    // 红包分享页面
    public function show(Request $request, $id, $redbag_addr)
    {
        $lang = $request->get('lang', 'zh');
        $target = $request->get('target', 'draw') == 'draw' ? 'draw' : 'draw2';

        $url = $this->uri . '/' . $id . '/' . $redbag_addr;

        $res = $this->httpReq($url);

        $share_type = $res['share_type'];
        $share_attr = $res['share_attr'];
        $share_msg = $res['share_msg'];
        $symbol = $res['redbag_symbol'];

        $share_type_class = '';
        switch($share_type){
            case 1:
                $share_type_class = 'img-ct';
            break;
            case 2:
                return redirect(action('RedbagController@' . $target, compact('id','redbag_addr','target','lang')));
            break;
            case 3:
                $share_type_class = 'iframe-ct';
            break;
            case 4:
                $share_type_class = 'dom-ct';
            break;
            default:
                abort(404);
        }

        if(in_array($share_type, [1, 3]) && !parse_url($share_attr, PHP_URL_SCHEME)){
            $share_attr = 'http://' . $share_attr;
        }

        return view('redbag.rpDetail', compact('share_type','share_attr', 'id', 'redbag_addr', 'share_type_class', 'share_msg', 'lang', 'target', 'symbol'));
    }

    // 红包领取界面
    public function draw(Request $request, $id, $redbag_addr)
    {
        $lang = $request->get('lang', 'zh');

        $url = $this->uri . '/' . $id . '/' . $redbag_addr;

        $res = $this->httpReq($url);
        if($res['share_type'] == 0){
            abort(404);
        }
        $target = 'draw';
        $redbag_id = $res['redbag_id'];
        $share_user = $res['share_user'];
        $share_msg = $res['share_msg'];
        $symbol = $res['redbag_symbol'];
        $qr_text = action('RedbagController@show', compact('id','redbag_addr','share_user','lang','target','symbol')) . '&inwe';
        return view('redbag.rpGetLink', compact('redbag_id', 'redbag_addr', 'qr_text', 'share_user', 'share_msg', 'symbol'));
    }

    // inwe App 红包界面
    public function draw2(Request $request, $id, $redbag_addr)
    {
        $lang = $request->get('lang', 'zh');

        $url = $this->uri . '/' . $id . '/' . $redbag_addr;

        $res = $this->httpReq($url);
        if($res['share_type'] == 0){
            abort(404);
        }
        $target = 'draw2';
        $redbag_id = $res['redbag_id'];
        $share_user = $res['share_user'];
        $share_msg = $res['share_msg'];
        $symbol = $res['redbag_symbol'];
        $qr_text = action('RedbagController@show', compact('id','redbag_addr','share_user', 'lang','target', 'symbol')) . '&inwe';
        return view('redbag.rpGet', compact('redbag_id', 'redbag_addr', 'qr_text', 'share_user', 'share_msg', 'symbol'));
    }

    // 拆红包
    public function store(Request $request, $id, $redbag_addr)
    {
        $validator = \Validator::make($request->all(), [
            'wallet_addr' => 'required'
        ]);

        if($validator->fails()){
            return fail($validator->errors()->first(), NOT_VALIDATED);
        }

        $url = env('INWE_URL') . 'redbag/draw/' . $id . '/' . $redbag_addr;

        $info = HttpReq::url($url)->request([
            'wallet_addr' => $request->get('wallet_addr')
        ], 'POST');

        if(empty($info['code'])){
            return fail();
        }else if($info['code'] == 4000){
            return success($info['data']);
        }else{
            return fail($info['msg'], $info['code']);
        }
    }
}
