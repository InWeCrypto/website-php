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
        $url = $this->uri . '/' . $id . '/' . $redbag_addr;

        $res = $this->httpReq($url);

        $share_type = $res['share_type'];

        $share_type_class = '';
        switch($share_type){
            case 1:
                $share_type_class = 'img-ct';
            break;
            case 2:
                return redirect(action('RedbagController@draw', compact('id','redbag_addr')));
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
        $share_attr = $res['share_attr'];
        $share_msg = $res['share_msg'];
        return view('redbag.rpDetail', compact('share_type','share_attr', 'id', 'redbag_addr', 'share_type_class', 'share_msg'));
    }

    // 红包领取界面
    public function draw(Request $request, $id, $redbag_addr)
    {
        $url = $this->uri . '/' . $id . '/' . $redbag_addr;

        $res = $this->httpReq($url);
        if($res['share_type'] == 0){
            abort(404);
        }
        $redbag_id = $res['redbag_id'];
        $share_user = $res['share_user'];
        $share_msg = $res['share_msg'];
        $qr_text = action('RedbagController@store', compact('id','redbag_addr'));
        return view('redbag.rpGetLink', compact('redbag_id', 'redbag_addr', 'qr_text', 'share_user', 'share_msg'));
    }

    // inwe App 红包界面
    public function draw2(Request $request, $id, $redbag_addr)
    {
        $url = $this->uri . '/' . $id . '/' . $redbag_addr;

        $res = $this->httpReq($url);
        if($res['share_type'] == 0){
            abort(404);
        }
        $redbag_id = $res['redbag_id'];
        $share_user = $res['share_user'];
        $share_msg = $res['share_msg'];
        $qr_text = action('RedbagController@store', compact('id','redbag_addr'));
        return view('redbag.rpGet', compact('redbag_id', 'redbag_addr', 'qr_text', 'share_user', 'share_msg'));
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
