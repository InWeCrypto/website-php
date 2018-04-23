<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Cache;

class ArticleController extends BaseController
{
    public $uri = 'article';

    public function index(Request $request)
    {
        $res = $this->httpReq('article');
        extract($res);

        $articles =new LengthAwarePaginator($data, $total, $per_page, $current_page, [
                'path' => Paginator::resolveCurrentPath(),  //设定个要分页的url地址。也可以手动通过 $paginator ->setPath(‘路径’) 设置
                'pageName' => 'page',
        ]);

        $search_keywords = $this->getSearchKeyword();
        return view($this->lang . '.' .'articles', compact('articles','search_keywords'));
    }

    public function show(Request $request)
    {
        $id = $request->get('art_id');
        if(!$id){
            return redirect('/' . $this->lang . '/home');
        }
        // $cache = 'INWE:ARTICLE:SHOW:' . $id;
        // $cache_time = env('ARTICLE_CACHE_TIME', 10);
        $url = 'article/' . $id ;
        // $res = Cache::remember($cache, $cache_time, function() use($url) {
            $res = $this->httpReq($url, ['update_click_rate' => true]);
            // return $res;
        // });
        $lang = $res['lang'] ?? $this->lang;
        // newsdetail2 是手机显示页面, newsdetail是分享出去的页面
        $page = $request->route()->uri() == 'newsdetail2' ? 'detail_2' : 'detail';

        if($ip = $request->header('X-Forwarded-For', getRealIp())){
            \Log::info('文章 ' . $id . ' 详情页访问IP:' . $ip);
        }

        return view($lang . '.' . $page, $res);
    }

    public function search()
    {
        $k = \Request::get('k');
        $res = $this->httpReq('search/all');
        extract($res);
        $articles =new LengthAwarePaginator($data, $total, $per_page, $current_page, [
                'path' => Paginator::resolveCurrentPath(),  //设定个要分页的url地址。也可以手动通过 $paginator ->setPath(‘路径’) 设置
                'pageName' => 'page',
        ]);
        $articles->setPath('/' .$this->lang. '/search/all?k=' . $k);
        return view($this->lang . '.' .'search', compact('articles', 'k'));
    }

    public function getSearchKeyword()
    {
        $cache = 'INWE:SEARCH_KEYWORD';
        $cache_time = 10;
        return Cache::remember($cache, $cache_time, function() {
            $res = $this->httpReq('search/keywords');
            return $res;
        });
    }

    public function helpcenter(Request $req)
    {
        $page = $req->get('page', 1);

        $lang = $this->lang;

        $url = 'article?type=[8,9,10,11]&per_page=20&lang=' . $lang . '&page=' . $page;

        $res = $this->httpReq($url);

        extract($res);

        $articles =new LengthAwarePaginator($data, $total, $per_page, $current_page, [
                'path' => Paginator::resolveCurrentPath(),  //设定个要分页的url地址。也可以手动通过 $paginator ->setPath(‘路径’) 设置
                'pageName' => 'page',
        ]);

        return view($this->lang . '.' .'helpcenter', compact('articles'));
    }
}
