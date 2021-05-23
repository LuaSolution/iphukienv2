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

            Route::get('/news-add', 'NewsController@getAddNews')->name('adMgetAddNews');
            Route::post('/news-add', 'NewsController@postAddNews')->name('adMpostAddNews');
            Route::get('/news-edit/{id}', 'NewsController@getEditNews')->name('adMgetEditNews');
            Route::post('/news-edit/{id}', 'NewsController@postEditNews')->name('adMpostEditNews');
            Route::get('/news', 'NewsController@getListNews')->name('adMgetListNews');
            Route::get('/news-del/{id}', 'NewsController@getDelNews')->name('adMgetDelNews');

            // Categories
            Route::get('/category-add', 'CategoryController@getAddCate')->name('adMgetAddCategory');
            Route::post('/category-add', 'CategoryController@postAddCate')->name('adMpostAddCategory');
            Route::get('/category-edit/{id}', 'CategoryController@getEditCate')->name('adMgetEditCategory');
            Route::post('/category-edit/{id}', 'CategoryController@postEditCate')->name('adMpostEditCategory');
            Route::get('/category', 'CategoryController@getListCate')->name('adMgetListCategory');
            Route::get('/category-del/{id}', 'CategoryController@getDelCate')->name('adMgetDelCategory');

            // Colors
            Route::get('/colors-add', 'ColorController@getAddColor')->name('adMgetAddColor');
            Route::post('/colors-add', 'ColorController@postAddColor')->name('adMpostAddColor');
            Route::get('/colors-edit/{id}', 'ColorController@getEditColor')->name('adMgetEditColor');
            Route::post('/colors-edit/{id}', 'ColorController@postEditColor')->name('adMpostEditColor');
            Route::get('/colors', 'ColorController@getListColor')->name('adMgetListColor');
            Route::get('/colors-del/{id}', 'ColorController@getDelColor')->name('adMgetDelColor');

            // Sizes
            Route::get('/sizes-add', 'SizeController@getAddSize')->name('adMgetAddSize');
            Route::post('/sizes-add', 'SizeController@postAddSize')->name('adMpostAddSize');
            Route::get('/sizes-edit/{id}', 'SizeController@getEditSize')->name('adMgetEditSize');
            Route::post('/sizes-edit/{id}', 'SizeController@postEditSize')->name('adMpostEditSize');
            Route::get('/sizes', 'SizeController@getListSize')->name('adMgetListSize');
            Route::get('/sizes-del/{id}', 'SizeController@getDelSize')->name('adMgetDelSize');

            // Role
            Route::get('/roles-add', 'RoleController@getAddRole')->name('adMgetAddRole');
            Route::post('/roles-add', 'RoleController@postAddRole')->name('adMpostAddRole');
            Route::get('/roles-edit/{id}', 'RoleController@getEditRole')->name('adMgetEditRole');
            Route::post('/roles-edit/{id}', 'RoleController@postEditRole')->name('adMpostEditRole');
            Route::get('/roles', 'RoleController@getListRole')->name('adMgetListRole');
            Route::get('/roles-del/{id}', 'RoleController@getDelRole')->name('adMgetDelRole');

            // Status
            Route::get('/statuses-add', 'StatusController@getAddStatus')->name('adMgetAddStatus');
            Route::post('/statuses-add', 'StatusController@postAddStatus')->name('adMpostAddStatus');
            Route::get('/statuses-edit/{id}', 'StatusController@getEditStatus')->name('adMgetEditStatus');
            Route::post('/statuses-edit/{id}', 'StatusController@postEditStatus')->name('adMpostEditStatus');
            Route::get('/statuses', 'StatusController@getListStatus')->name('adMgetListStatus');
            Route::get('/statuses-del/{id}', 'StatusController@getDelStatus')->name('adMgetDelStatus');

            // Tags
            Route::get('/tags-add', 'TagController@getAddTag')->name('adMgetAddTag');
            Route::post('/tags-add', 'TagController@postAddTag')->name('adMpostAddTag');
            Route::get('/tags-edit/{id}', 'TagController@getEditTag')->name('adMgetEditTag');
            Route::post('/tags-edit/{id}', 'TagController@postEditTag')->name('adMpostEditTag');
            Route::get('/tags', 'TagController@getListTag')->name('adMgetListTag');
            Route::get('/tags-del/{id}', 'TagController@getDelTag')->name('adMgetDelTag');

            // Payments
            Route::get('/payment-methods-add', 'PaymentMethodController@getAddPaymentMethod')->name('adMgetAddPaymentMethod');
            Route::post('/payment-methods-add', 'PaymentMethodController@postAddPaymentMethod')->name('adMpostAddPaymentMethod');
            Route::get('/payment-methods-edit/{id}', 'PaymentMethodController@getEditPaymentMethod')->name('adMgetEditPaymentMethod');
            Route::post('/payment-methods-edit/{id}', 'PaymentMethodController@postEditPaymentMethod')->name('adMpostEditPaymentMethod');
            Route::get('/payment-methods', 'PaymentMethodController@getListPaymentMethod')->name('adMgetListPaymentMethod');
            Route::get('/payment-methods-del/{id}', 'PaymentMethodController@getDelPaymentMethod')->name('adMgetDelPaymentMethod');

            // Deliveries
            Route::get('/deliveries-add', 'DeliveryController@getAddDelivery')->name('adMgetAddDelivery');
            Route::post('/deliveries-add', 'DeliveryController@postAddDelivery')->name('adMpostAddDelivery');
            Route::get('/deliveries-edit/{id}', 'DeliveryController@getEditDelivery')->name('adMgetEditDelivery');
            Route::post('/deliveries-edit/{id}', 'DeliveryController@postEditDelivery')->name('adMpostEditDelivery');
            Route::get('/deliveries', 'DeliveryController@getListDelivery')->name('adMgetListDelivery');
            Route::get('/deliveries-del/{id}', 'DeliveryController@getDelDelivery')->name('adMgetDelDelivery');

            // Trademarks
            Route::get('/trademarks-add', 'TrademarkController@getAddTrademark')->name('adMgetAddTrademark');
            Route::post('/trademarks-add', 'TrademarkController@postAddTrademark')->name('adMpostAddTrademark');
            Route::get('/trademarks-edit/{id}', 'TrademarkController@getEditTrademark')->name('adMgetEditTrademark');
            Route::post('/trademarks-edit/{id}', 'TrademarkController@postEditTrademark')->name('adMpostEditTrademark');
            Route::get('/trademarks', 'TrademarkController@getListTrademark')->name('adMgetListTrademark');
            Route::get('/trademarks-del/{id}', 'TrademarkController@getDelTrademark')->name('adMgetDelTrademark');

            // Flash sale
            Route::get('/sale-products-add', 'SaleProductController@getAddSaleProduct')->name('adMgetAddSaleProduct');
            Route::post('/sale-products-add', 'SaleProductController@postAddSaleProduct')->name('adMpostAddSaleProduct');
            Route::get('/sale-products', 'SaleProductController@getListSaleProduct')->name('adMgetListSaleProduct');
            Route::get('/sale-products-del/{id}', 'SaleProductController@getDelSaleProduct')->name('adMgetDelSaleProduct');

            // Products
            Route::get('/products-add', 'ProductController@getAddProduct')->name('adMgetAddProduct');
            Route::get('/sync-products-from-nhanh', 'ProductController@syncProductFromNhanh')->name('syncProductFromNhanh');
            Route::post('/products-add', 'ProductController@postAddProduct')->name('adMpostAddProduct');
            Route::get('/products-edit/{id}', 'ProductController@getEditProduct')->name('adMgetEditProduct');
            Route::post('/products-edit/{id}', 'ProductController@postEditProduct')->name('adMpostEditProduct');
            Route::get('/products', 'ProductController@getListProduct')->name('adMgetListProduct');
            Route::get('/products-del/{id}', 'ProductController@getDelProduct')->name('adMgetDelProduct');
            Route::post('/update-product-image', 'ProductController@updateProductImage')->name('adMpostUpdateProductImage');
            Route::post('/delete-product-image', 'ProductController@deleteProductImage')->name('adMpostdeleteProductImage');

            // Orders
            Route::get('/orders', 'OrderController@getListOrder')->name('adMgetListOrders');
            Route::get('/orders-edit/{id}', 'OrderController@getEditOrder')->name('adMgetEditOrders');
            Route::get('/orders-del/{id}', 'OrderController@getDelOrder')->name('adMgetDelOrder');

            //contact
            Route::get('/contact-list', 'AdminController@getListContact')->name('adMgetListContact');
            Route::get('/contact-edit/{id}', 'AdminController@getContact')->name('adMgetEditContact');

            //order
            Route::get('/order-list', 'AdminController@getListOrder')->name('adMgetListOrder');
            Route::get('/order-edit/{id}', 'AdminController@getOrder')->name('adMgetEditOrder');
            Route::get('/order-confirm/{id}', 'AdminController@getConfimOrder')->name('adMgetConfimOrder');

            // User
            Route::get('/user-add', 'UserController@getAddUser')->name('adMgetAddUser');
            Route::post('/user-add', 'UserController@postAddUser')->name('adMpostAddUser');
            Route::get('/user', 'UserController@getListUser')->name('adMgetListUser');
            Route::get('/user-del/{id}', 'UserController@getDelUser')->name('adMgetDelUser');
            Route::post('/update-password', 'UserController@postUpdatePassword')->name('adMpostUpdatePassword');
            Route::post('/upload-img', 'UserController@uploadImage')->name('uploadImage');

            //Static page
            Route::get('/static-add', 'StaticPagesController@getAddStaticPages')->name('adMgetAddStaticPage');
            Route::post('/static-add', 'StaticPagesController@postAddStaticPages')->name('adMpostAddStaticPages');
            Route::get('/static', 'StaticPagesController@getListStaticPages')->name('adMgetListStaticPage');
            Route::get('/static-del/{id}', 'StaticPagesController@getDeStaticPages')->name('adMgetDelStaticPages');
            Route::get('/static-edit/{id}', 'StaticPagesController@getEditStaticPages')->name('adMgetEditStaticPages');
            Route::post('/static-edit/{id}', 'StaticPagesController@postEditStaticPages')->name('adMpostEditStaticPages');

            //Slider
            Route::resource('sliders', SliderController::class);
            Route::post('/sliders/{id}', 'SliderController@update')->name('sliders.update');
            

            //Metatags
            Route::get('/metatags-edit/{id}', 'MetatagController@getEditMeta')->name('adMgetEditMeta');
            Route::post('/metatags-edit/{id}', 'MetatagController@postEditMeta')->name('adMpostEditMeta');
            Route::get('/metatags', 'MetatagController@getListMeta')->name('adMgetListMeta');
            Route::get('/metatags-del/{id}', 'MetatagController@getDelMeta')->name('adMgetDelMeta');

            //Partner
            Route::resource('partners', PartnerController::class);
        });

    });

    Route::get('/', 'User\HomeController@index')->name('getHome');
    Route::get('/login', 'User\UserController@login')->name('login');
    Route::get('/logout', 'User\UserController@doLogout')->name('doLogout');
    Route::post('/login', 'User\UserController@doLogin')->name('doLogin');
    Route::get('/forgot-password', 'User\UserController@forgotPassword')->name('forgot-password');
    Route::get('/signup', 'User\UserController@signup')->name('signup');
    Route::post('/signup', 'User\UserController@doSignup')->name('doSignup');
    Route::get('/products/{id}', 'User\ProductController@show')->name('products.show');
    Route::get('/categories/{id}', 'User\CategoryController@show')->name('categories.show');
    Route::get('/search/categories/{id}', 'User\CategoryController@searchAjax')->name('categories.search_ajax');
    Route::get('/cart', 'User\UserController@cart')->name('user.cart');
    Route::get('/payment', 'User\UserController@payment')->name('user.payment');
    Route::get('/payment-complete/{orderId}', 'User\UserController@paymentComplete')->name('user.payment-complete');
    Route::get('/orders/{orderId}', 'User\UserController@orderDetails')->name('user.order-details');
    Route::get('/location/{type}/{parentId?}', 'User\AjaxController@getLocation')->name('ajax.location');
    Route::post('/post-contact', 'User\HomeController@postContact')->name('postContact');
    Route::post('/post-forgot', 'User\HomeController@postForgotPassword')->name('postForgotPassword');
    Route::get('/orders', 'User\UserController@getListOrders')->name('user.orders');
    Route::get('/user-information', 'User\UserController@getUserInformation')->name('user.information');
    Route::post('/user-information', 'User\UserController@postUserInformation')->name('update.information');
    Route::get('/user-addresses', 'User\UserController@getUserAddresses')->name('user.addresses');
    Route::get('/user-change-password', 'User\UserController@changePassword')->name('user.change-password');
    Route::post('/user-do-change-password', 'User\AjaxController@doChangePassword')->name('user.do-change-password');
    Route::get('/user-wishlist', 'User\UserController@getUserWishlist')->name('user.wishlist');
    Route::get('/news', 'User\NewsController@index')->name('news.index');
    Route::get('/news/{news}', 'User\NewsController@show')->name('news.show');
    Route::post('/add-new-address', 'User\UserController@addNewAddress')->name('user.add-new-address');
    Route::get('/set-default-address/{id}', 'User\UserController@setDefaultAddress')->name('user.set-default-address');
    Route::get('/delete-address/{id}', 'User\UserController@deleteAddress')->name('user.delete-address');
    Route::get('/get-child-product', 'User\AjaxController@getChildProduct')->name('ajax.get-child-product');
    Route::post('/login-social', 'User\AjaxController@loginWithSocial')->name('ajax.login-with-social');
    Route::post('/calc-shipping-fee', 'User\AjaxController@calcShippingFee')->name('ajax.calc-shipping-fee');
    Route::post('/create-order', 'User\AjaxController@createOrder')->name('ajax.create-order');
    Route::post('/quickview-product/{productId}', 'User\AjaxController@getQuickViewProduct')->name('ajax.quickview-product');
    Route::post('/add-to-wishlist', 'User\AjaxController@addToWishlist')->name('ajax.add-to-wishlist');
    Route::get('/search-products', 'User\ProductController@searchByKeyword')->name('product.search');
    Route::get('/{url}', 'User\HomeController@getStaticPage')->name('getStaticPage');
});
