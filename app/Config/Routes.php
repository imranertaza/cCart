<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/user_subscribe', 'Home::user_subscribe');

$routes->get('/admin', 'Admin\Login::index');
$routes->post('/admin/login_action', 'Admin\Login::login_action');
$routes->get('/admin/logout', 'Admin\Login::logout');
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');

//Attribute_group
$routes->get('/admin/attribute_group', 'Admin\Attribute_group::index');
$routes->get('/admin/attribute_create', 'Admin\Attribute_group::create');
$routes->post('/admin/attribute_create_action', 'Admin\Attribute_group::create_action');
$routes->post('/admin/attribute_update_action', 'Admin\Attribute_group::update_action');
$routes->get('/admin/attribute_update/(:num)', 'Admin\Attribute_group::update/$1');
$routes->get('/admin/attribute_delete/(:num)', 'Admin\Attribute_group::delete/$1');

//Brand
$routes->get('/admin/brand', 'Admin\Brand::index');
$routes->get('/admin/brand_create', 'Admin\Brand::create');
$routes->post('/admin/brand_create_action', 'Admin\Brand::create_action');
$routes->post('/admin/brand_update_action', 'Admin\Brand::update_action');
$routes->get('/admin/brand_update/(:num)', 'Admin\Brand::update/$1');
$routes->get('/admin/brand_delete/(:num)', 'Admin\Brand::delete/$1');

//Color_family
$routes->get('/admin/color_family', 'Admin\Color_family::index');
$routes->get('/admin/color_family_create', 'Admin\Color_family::create');
$routes->post('/admin/color_family_create_action', 'Admin\Color_family::create_action');
$routes->post('/admin/color_family_update_action', 'Admin\Color_family::update_action');
$routes->get('/admin/color_family_update/(:num)', 'Admin\Color_family::update/$1');
$routes->get('/admin/color_family_delete/(:num)', 'Admin\Color_family::delete/$1');

//Product_category
$routes->get('/admin/product_category', 'Admin\Product_category::index');
$routes->get('/admin/product_category_create', 'Admin\Product_category::create');
$routes->post('/admin/product_category_create_action', 'Admin\Product_category::create_action');
$routes->post('/admin/product_category_update_action', 'Admin\Product_category::update_action');
$routes->post('/admin/product_category_update_action_others', 'Admin\Product_category::update_action_others');
$routes->get('/admin/product_category_update/(:num)', 'Admin\Product_category::update/$1');
$routes->get('/admin/product_category_delete/(:num)', 'Admin\Product_category::delete/$1');

$routes->post('/admin/product_category_sort_update_action', 'Admin\Product_category::sort_update_action');

//Products
$routes->get('/admin/products', 'Admin\Products::index');
$routes->get('/admin/product_create', 'Admin\Products::create');
$routes->post('/admin/product_create_action', 'Admin\Products::create_action');
$routes->post('/admin/product_copy_action', 'Admin\Products::copy_action');
$routes->post('/admin/product_update_action', 'Admin\Products::update_action');
$routes->post('/admin/product_image_delete', 'Admin\Products::image_delete');
$routes->get('/admin/product_update/(:num)', 'Admin\Products::update/$1');
$routes->get('/admin/product_delete/(:num)', 'Admin\Products::delete/$1');
$routes->get('/admin/related_product', 'Admin\Products::related_product');
$routes->post('/admin/product_option_search', 'Admin\Products::product_option_search');
$routes->post('/admin/product_option_value_search', 'Admin\Products::product_option_value_search');

$routes->post('/admin/product_image_crop_action', 'Admin\Products::image_crop');

//User
$routes->get('/admin/user', 'Admin\User::index');
$routes->get('/admin/user_create', 'Admin\User::create');
$routes->post('/admin/user_create_action', 'Admin\User::create_action');
$routes->post('/admin/user_update_action', 'Admin\User::update_action');
$routes->post('/admin/user_general_action', 'Admin\User::general_action');
$routes->post('/admin/user_image_action', 'Admin\User::image_action');
$routes->get('/admin/user_update/(:num)', 'Admin\User::update/$1');
$routes->get('/admin/user_delete/(:num)', 'Admin\User::delete/$1');

//Role
$routes->get('/admin/role', 'Admin\Role::index');
$routes->get('/admin/role_create', 'Admin\Role::create');
$routes->post('/admin/role_create_action', 'Admin\Role::create_action');
$routes->post('/admin/role_update_action', 'Admin\Role::update_action');
$routes->get('/admin/role_update/(:num)', 'Admin\Role::update/$1');
$routes->get('/admin/role_delete/(:num)', 'Admin\Role::delete/$1');

//Customers
$routes->get('/admin/customers', 'Admin\Customers::index');
$routes->get('/admin/customers_create', 'Admin\Customers::create');
$routes->post('/admin/customers_create_action', 'Admin\Customers::create_action');
$routes->post('/admin/customers_update_action', 'Admin\Customers::update_action');
$routes->post('/admin/customers_general_action', 'Admin\Customers::general_action');
$routes->get('/admin/customers_update/(:num)', 'Admin\Customers::update/$1');
$routes->get('/admin/customers_delete/(:num)', 'Admin\Customers::delete/$1');
$routes->get('/admin/customers_ledger/(:num)', 'Admin\Customers::ledger/$1');

// founds request
$routes->get('/admin/fund_request', 'Admin\Fund_request::index');
$routes->post('/admin/fund_request_action', 'Admin\Fund_request::fund_action');

//Settings
$routes->get('/admin/settings', 'Admin\Settings::index');
$routes->post('/admin/settings_update_action', 'Admin\Settings::update_action');


//Shipping
$routes->get('/admin/shipping', 'Admin\Shipping\Shipping::index');

$routes->get('/admin/shipping_settings/(:num)', 'Admin\Shipping\Shipping::shipping_settings/$1');
$routes->post('/admin/shipping_update_action', 'Admin\Shipping\Shipping::update_action');
$routes->post('/admin/update_shipping_status', 'Admin\Shipping\Shipping::update_status');
$routes->post('/admin/remove_settings_weight', 'Admin\Shipping\Shipping::remove_settings_weight');


$routes->post('/admin/zone_rate_update_action', 'Admin\Shipping\Shipping::zone_rate_update_action');
$routes->post('/admin/zone_rate_delete', 'Admin\Shipping\Shipping::zone_rate_delete');


//Payment method
$routes->get('/admin/payment', 'Admin\Payment\Payment::index');
$routes->post('/admin/payment_status_update', 'Admin\Payment\Payment::status_update');

$routes->get('/admin/payment/cash_on/(:num)', 'Admin\Payment\Cash_on_delivery::settings/$1');
$routes->post('/admin/cash_on_update_action', 'Admin\Payment\Cash_on_delivery::update_action');

$routes->get('/admin/payment/bank_transfer/(:num)', 'Admin\Payment\Bank_transfer::bank_settings/$1');
$routes->post('/admin/bank_transfer_update_action', 'Admin\Payment\Bank_transfer::update_action');

$routes->get('/admin/payment/paypal/(:num)', 'Admin\Payment\Paypal::settings/$1');
$routes->post('/admin/paypal_update_action', 'Admin\Payment\Paypal::update_action');

$routes->get('/admin/payment/western_union/(:num)', 'Admin\Payment\Western_union::settings/$1');
$routes->post('/admin/western_union_update_action', 'Admin\Payment\Western_union::update_action');

$routes->get('/admin/payment/moneyGram/(:num)', 'Admin\Payment\MoneyGram::settings/$1');
$routes->post('/admin/moneyGram_update_action', 'Admin\Payment\MoneyGram::update_action');

$routes->get('/admin/payment/bitcoin/(:num)', 'Admin\Payment\Bitcoin::settings/$1');
$routes->post('/admin/bitcoin_update_action', 'Admin\Payment\Bitcoin::update_action');

$routes->get('/admin/payment/credit_card/(:num)', 'Admin\Payment\Credit_card::settings/$1');
$routes->post('/admin/credit_card_update_action', 'Admin\Payment\Credit_card::update_action');

$routes->get('/admin/payment/u_wallet/(:num)', 'Admin\Payment\U_wallet::settings/$1');
$routes->post('/admin/u_wallet_update_action', 'Admin\Payment\U_wallet::update_action');

//Ajax
$routes->get('/admin/page_list', 'Admin\Page_settings::index');
$routes->get('/admin/page_create', 'Admin\Page_settings::create');
$routes->get('/admin/page_update/(:num)', 'Admin\Page_settings::update/$1');
$routes->get('/admin/page_delete/(:num)', 'Admin\Page_settings::delete/$1');
$routes->post('/admin/page_create_action', 'Admin\Page_settings::create_action');
$routes->post('/admin/page_update_action', 'Admin\Page_settings::update_action');

//Coupon
$routes->get('/admin/coupon', 'Admin\Coupon::index');
$routes->get('/admin/coupon_create', 'Admin\Coupon::create');
$routes->post('/admin/coupon_create_action', 'Admin\Coupon::create_action');
$routes->post('/admin/coupon_update_action', 'Admin\Coupon::update_action');
$routes->get('/admin/coupon_update/(:num)', 'Admin\Coupon::update/$1');
$routes->get('/admin/coupon_delete/(:num)', 'Admin\Coupon::delete/$1');

//
$routes->get('/admin/module', 'Admin\Module::index');
$routes->post('/admin/module_update_action', 'Admin\Module::update_action');
$routes->post('/admin/module_update', 'Admin\Ajax::module_update');
$routes->get('/admin/module_settings/(:num)', 'Admin\Module::module_settings/$1');
$routes->post('/admin/module_settings_action', 'Admin\Module::module_settings_action');

//
$routes->get('/admin/newsletter', 'Admin\Newsletter::index');

$routes->get('/admin/option', 'Admin\Option::index');
$routes->get('/admin/option_create', 'Admin\Option::create');
$routes->post('/admin/option_create_action', 'Admin\Option::create_action');
$routes->post('/admin/option_update_action', 'Admin\Option::update_action');
$routes->get('/admin/option_update/(:num)', 'Admin\Option::update/$1');
$routes->get('/admin/option_delete/(:num)', 'Admin\Option::delete/$1');
$routes->post('/admin/option_remove_action', 'Admin\Option::option_remove_action');

//Coupon
$routes->get('/admin/order_list', 'Admin\Order::index');
$routes->post('/admin/order_history_action', 'Admin\Order::history_action');
$routes->get('/admin/order_view/(:num)', 'Admin\Order::order_view/$1');

//Theme Settings

$routes->get('/admin/theme_settings', 'Admin\Theme_settings::index');
$routes->post('/admin/slider_update', 'Admin\Theme_settings::slider_update');
$routes->post('/admin/logo_update', 'Admin\Theme_settings::logo_update');
$routes->post('/admin/home_category', 'Admin\Theme_settings::home_category');
$routes->post('/admin/home_category_banner', 'Admin\Theme_settings::home_category_banner');
$routes->post('/admin/settings_update', 'Admin\Theme_settings::settings_update');
$routes->post('/admin/home_special_banner', 'Admin\Theme_settings::home_special_banner');
$routes->post('/admin/home_left_side_banner', 'Admin\Theme_settings::home_left_side_banner');
$routes->post('/admin/favicon_update', 'Admin\Theme_settings::favicon_update');


$routes->post('/admin/header_section_one_update', 'Admin\Theme_settings_3::header_section_one_update');
$routes->post('/admin/header_section_two_update', 'Admin\Theme_settings_3::header_section_two_update');
$routes->post('/admin/home_category_update', 'Admin\Theme_settings_3::home_category_update');
$routes->post('/admin/banner_bottom_update', 'Admin\Theme_settings_3::banner_bottom_update');

//Localization
$routes->get('/admin/geo_zone', 'Admin\Geo_zone::index');
$routes->get('/admin/geo_zone_create', 'Admin\Geo_zone::create');
$routes->post('/admin/geo_zone_create_action', 'Admin\Geo_zone::create_action');
$routes->get('/admin/geo_zone_update/(:num)', 'Admin\Geo_zone::update/$1');
$routes->post('/admin/geo_zone_update_action', 'Admin\Geo_zone::update_action');
$routes->get('/admin/geo_zone_delete/(:num)', 'Admin\Geo_zone::delete/$1');
$routes->post('/admin/geo_zone_detail_delete', 'Admin\Geo_zone::geo_zone_detail_delete');

//Email_send
$routes->get('/admin/email_send', 'Admin\Email_send::index');
$routes->post('/admin/email_send_action', 'Admin\Email_send::email_send_action');

//Reviews
$routes->get('/admin/reviews', 'Admin\Reviews::index');
$routes->post('/admin/reviews_status_update', 'Admin\Reviews::reviews_status_update');
$routes->get('/admin/reviews_delete/(:num)', 'Admin\Reviews::delete/$1');

//Advanced Products routes
$routes->get('/admin/bulk_edit_products', 'Admin\Advanced_products::index');
$routes->post('/admin/bulk_status_update', 'Admin\Advanced_products::bulk_status_update');
$routes->post('/admin/bulk_data_update', 'Admin\Advanced_products::bulk_data_update');
$routes->post('/admin/bulk_all_status_update', 'Admin\Advanced_products::bulk_all_status_update');
$routes->post('/admin/bulk_category_view', 'Admin\Advanced_products::bulk_category_view');
$routes->post('/admin/bulk_category_update', 'Admin\Advanced_products::bulk_category_update');
$routes->post('/admin/description_data_update', 'Admin\Advanced_products::description_data_update');

$routes->post('/admin/bulk_option_view', 'Admin\Advanced_products::bulk_option_view');
$routes->post('/admin/bulk_option_update', 'Admin\Advanced_products::bulk_option_update');


//login routes
$routes->get('/register', 'Login::register');
$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login_action');
$routes->post('/register_action', 'Login::register_action');
$routes->get('/logout', 'Login::logout');
$routes->get('/forgotpassword', 'Login::forgotPassword');
$routes->post('/password_action', 'Login::password_action');
$routes->get('/otp_submit', 'Login::otp_submit');
$routes->post('/otp_action', 'Login::otp_action');
$routes->get('/password_reset', 'Login::password_reset');
$routes->post('/reset_action', 'Login::reset_action');


//Customer Dashboard routes
$routes->get('/dashboard', 'Customer\Dashboard::index');
$routes->post('/addtoWishlist', 'Customer\Dashboard::addtoWishlist');


$routes->get('/favorite', 'Customer\Favorite::index');
$routes->post('/removeToWishlist', 'Customer\Favorite::removeToWishlist');
$routes->get('/my_order', 'Customer\Order::index');
$routes->get('/invoice/(:num)', 'Customer\Order::invoice/$1');

$routes->get('/profile', 'Customer\Profile::index');
$routes->post('/profile_update_action', 'Customer\Profile::update_action');
$routes->post('/password_action_update', 'Customer\Profile::password_action');
$routes->post('/newsletter_action', 'Customer\Profile::newsletter_action');


$routes->get('/my_wallet', 'Customer\Wallet::index');
$routes->get('/add_funds', 'Customer\Wallet::add_funds');
$routes->post('/add_funds_action', 'Customer\Wallet::fund_action');

$routes->get('/ledger', 'Customer\Customer_ledger::index');



//cart routes
$routes->get('/cart', 'Cart\Cart::index');
$routes->post('/checkoption', 'Cart\Cart::checkoption');
$routes->post('/addtocart', 'Cart\Cart::addToCart');
$routes->post('/addtocartdetail', 'Cart\Cart::addtocartdetail');
$routes->post('/addtocartgroup', 'Cart\Cart::addToCartGroup');
$routes->post('/updateToCart', 'Cart\Cart::updateToCart');
$routes->post('/removeToCart', 'Cart\Cart::removeToCart');
$routes->get('/cart_empty_check', 'Cart\Cart::cart_empty_check');

//Checkout
$routes->get('/checkout', 'Checkout::index');
$routes->post('/checkout_coupon_action', 'Checkout::coupon_action');
$routes->post('/checkout_action', 'Checkout::checkout_action');
$routes->post('/checkout_country_zoon', 'Checkout::country_zoon');
$routes->post('/flat_shipping_rate', 'Checkout::flat_shipping_rate');
$routes->post('/zone_shipping_rate', 'Checkout::zone_shipping_rate');
$routes->post('/shipping_rate', 'Checkout::shipping_rate');

$routes->get('/checkout_success', 'Checkout::success');
$routes->get('/checkout_failed', 'Checkout::failed');
$routes->get('/checkout_canceled', 'Checkout::canceled');

$routes->post('/payment_instruction', 'Checkout::payment_instruction');

$routes->get('/payment_paypal', 'Paypal::index');
$routes->get('/payment_paypal_checkout_action', 'Paypal::paypal_checkout_action');


//pages routes
$routes->get('/about', 'Pages\Pages::about');
$routes->get('/contact', 'Pages\Pages::contact');
$routes->post('/contact_form_action', 'Pages\Pages::contact_action');
$routes->get('/page/(:any)', 'Pages\Pages::page/$1');

//products routes
$routes->get('/detail/(:num)', 'Products\Products::detail/$1');
$routes->post('/review', 'Products\Products::review');
$routes->post('/both_product_price', 'Products\Products::both_product_price');
$routes->post('/optionPriceCalculate', 'Products\Products::optionPriceCalculate');

$routes->get('/featuredproducts', 'Featuredproducts::index');

//Compare
$routes->get('/compare', 'Compare::index');
$routes->post('/addtoCompare', 'Compare::addtoCompare');
$routes->post('/removeToCompare', 'Compare::removeToCompare');

//Category
$routes->get('/category/(:num)', 'Category::index/$1');
$routes->Post('/category_url_generate', 'Category::url_generate');

//Search top
$routes->post('/top_search', 'Search::search_action');

//ajax controller
$routes->post('/admin/get_state', 'Admin\Ajax::get_state');
$routes->post('/admin/get_zone_value', 'Admin\Ajax::get_zone_value');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}