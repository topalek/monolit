<?php

use Illuminate\Support\Facades\Route;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

Route::prefix('artisan')->group(function () {
    Route::get('cache', function () {
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        return response()
            ->json([
                'status' => 200,
                'data' => [
                    'message' => 'cache success'
                ]
            ]);
    });

    Route::get('view', function () {
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        return response()
            ->json([
                'status' => 200,
                'data' => [
                    'message' => 'cache success'
                ]
            ]);
    });

    Route::get('conf', function () {
        \Illuminate\Support\Facades\Artisan::call('config:cache');
        return response()
            ->json([
                'status' => 200,
                'data' => [
                    'message' => 'clear success'
                ]
            ]);
    });

    Route::get('ip', function (\Illuminate\Http\Request $request) {
        return response()
            ->json([
                'status' => 200,
                'data' => [
                    'message' => $request->ip()
                ]
            ]);
    });
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('/all/offers/{category}', 'HomeController@viewAllOffers')->name('all.offers');
Route::get('/view/object/{link}', 'HomeController@viewObject')->name('view.object');
Route::post('/load/apartments', 'HomeController@ajax')->name('load.apartments');
Route::get('/search', 'SearchController@index')->name('search.apartment');
Route::post('/send/order/view/apartment', 'OrderController@orderView')->name('order.view.apartment');
Route::get('/filter', 'HomeController@filter')->name('filter');
Route::get('/company', 'HomeController@company')->name('company');
Route::get('/presentation', 'HomeController@presentation')->name('presentation');
Route::get('/recently', 'HomeController@recently')->name('recently');
Route::get('/save-view/{view}', 'HomeController@saveView')->name('save.view');
Route::get('/district/{city}', 'HomeController@district')->name('district');
Route::get('/test/email', 'OrderController@testEmail');
Route::get('/realty', 'HomeController@realty');
Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload')->name('unisharp.lfm.upload');
Route::get('/contacts', function(){
    return view('monolit.pages.contacts');
});
Route::post('/contacts', 'OrderController@contacts')->name('contacts');
Auth::routes();

