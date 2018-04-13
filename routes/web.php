<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

switch ($locale = substr(Request::path(), 0, 2)) {
    case 'zh':
    case 'en':
        App::setLocale($locale);
        break;
    default:
        $locale = App::getLocale();
}
Route::any('/', function () use ($locale) {
    return redirect($locale . '/home');
});

Route::group(['prefix' => $locale], function ($router) use ($locale) {
    $router->any('/platform', function () use ($locale) {
        return view($locale . '.' . 'platform');
    });
    $router->any('/download', function() use ($locale) {
        return view($locale . '.' . 'download');
    });
    $router->any('/downios', function() use ($locale) {
        return view($locale . '.' . 'downios');
    });

    $router->any('/helpcenter', 'ArticleController@helpcenter');

    $router->any('/home', 'ArticleController@index');

    $router->any('/search/all', 'ArticleController@search');

    $router->any('/', function () use ($locale) {
        return redirect($locale . '/home');
    });
});

$router->any('/newsdetail2', 'ArticleController@show');
$router->any('/newsdetail', 'ArticleController@show');
