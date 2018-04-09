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
        $cache = 'INWE:ARTICLE:SHOW:' . $id;
        $cache_time = env('ARTICLE_CACHE_TIME', 10);
        $url = 'article/' . $id;
        $res = Cache::remember($cache, $cache_time, function() use($url) {
            $res = $this->httpReq($url);
            return $res;
        });
        $lang = $res['lang'] ?? $this->lang;
        return view($lang . '.' .'detail', $res);
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
}
