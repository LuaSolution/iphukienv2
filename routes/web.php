<?php

Route::middleware(['runall', 'locale'])->group(function () {
    Route::get('change-language/{language}', 'MainController@changeLanguage')->name('user.change-language');
    Auth::routes();

    // Admin ***************************************
    Route::group(['prefix' => 'metronic-admin', 'namespace' => 'MetronicAdmin'], function () {

        Route::get('/login', 'AdminController@getLogin')->name('adMgetLogin');
        Route::post('/login', 'AdminController@postLogin')->name('adMpostLogin');

        Route::middleware(['check_admin'])->group(function () {

            // Home
            Route::get('/', 'AdminController@getHome')->name('adMgetHome');
            Route::post('/config', 'AdminController@updateConfig')->name('adMupdateConfig');

            // News
            Route::get('/news-add', 'AdminController@getAddNews')->name('adMgetAddNews');
            Route::post('/news-add', 'AdminController@postAddNews')->name('adMpostAddNews');
            Route::get('/news-edit/{id}', 'AdminController@getEditNews')->name('adMgetEditNews');
            Route::post('/news-edit/{id}', 'AdminController@postEditNews')->name('adMpostEditNews');
            Route::get('/news', 'AdminController@getListNews')->name('adMgetListNews');
            Route::get('/news-del/{id}', 'AdminController@getDelNews')->name('adMgetDelNews');
            //contact
            Route::get('/contact-list', 'AdminController@getListContact')->name('adMgetListContact');
            Route::get('/contact-edit/{id}', 'AdminController@getContact')->name('adMgetEditContact');
            //order
            Route::get('/order-list', 'AdminController@getListOrder')->name('adMgetListOrder');
            Route::get('/order-edit/{id}', 'AdminController@getOrder')->name('adMgetEditOrder');
            Route::get('/order-confirm/{id}', 'AdminController@getConfimOrder')->name('adMgetConfimOrder');
            // User
            Route::post('/user-add', 'AdminController@postAddUser')->name('adMpostAddUser');
            Route::get('/user', 'AdminController@getListUser')->name('adMgetListUser');
            Route::get('/user-del/{id}', 'AdminController@getDelUser')->name('adMgetDelUser');
            Route::post('/update-password', 'AdminController@postUpdatePassword')->name('adMpostUpdatePassword');
            Route::post('/upload-img', 'AdminController@uploadImage')->name('uploadImage');
        });

    });
    // FRONDEND ***********
    Route::get('/phuong-thuc-thanh-toan', function () {
        return view('user.blank');
    });
    Route::get('/chinh-sach-doi-tra', function () {
        return view('user.blank');
    });

    Route::get('/cach-thuc-thanh-toan', function () {
        return view('user.blank');
    });

    Route::get('/thong-tin-ngan-hang', function () {
        return view('user.blank');
    });

    Route::get('/hoa-don-dien-tu', function () {
        return view('user.blank');
    });

    Route::get('/chinh-sach-bao-mat', function () {
        return view('user.blank');
    });

    Route::get('/gioi-thieu', function () {
        return view('user.blank');
    });

    Route::get('/tuyen-dung', function () {
        return view('user.blank');
    });
    Route::get('/gop-y', function () {
        return view('user.blank');
    });

    Route::post('/post-contact', 'User\HomeController@postContact')->name('postContact');
    //============================================================================
    Route::get('/', 'User\HomeController@index')->name('getHome');
Route::get('/login', 'User\UserController@login')->name('login');
Route::get('/forgot-password', 'User\UserController@forgotPassword')->name('forgot-password');
Route::get('/signup', 'User\UserController@signup')->name('signup');
Route::get('/products/{id}', 'User\ProductController@show')->name('products.show');
Route::get('/categories/{id}', 'User\CategoryController@show')->name('categories.show');
Route::get('/cart', 'User\UserController@cart')->name('user.cart');
Route::get('/payment', 'User\UserController@payment')->name('user.payment');
Route::get('/payment-complete', 'User\UserController@paymentComplete')->name('user.payment-complete');
Route::get('/orders/{orderId}', 'User\UserController@orderDetails')->name('user.order-details');
Route::get('/location/{type}/{parentId?}', 'User\UserAjaxController@getLocation')->name('ajax.location');
});