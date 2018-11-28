<?php

use Oseintow\Shopify\Facades\Shopify;

Route::get('/', function(\Illuminate\Http\Request $request) {

    $shopUrl = $request->shop;
    $scope = ["read_products","write_products","read_orders","read_all_orders"];
    $redirectUrl = "https://symben.com/geoapp/public/process_oauth_result";

    $shopify = Shopify::setShopUrl($shopUrl);
    return redirect()->to($shopify->getAuthorizeUrl($scope,$redirectUrl));

 });

Route::get("/install_shop",function()
{
    $shopUrl = $request->shop;
    $scope = ["read_products","write_products","read_orders","read_all_orders"];
    $redirectUrl = "https://symben.com/geoapp/public/process_oauth_result";

    $shopify = Shopify::setShopUrl($shopUrl);
    return redirect()->to($shopify->getAuthorizeUrl($scope,$redirectUrl));
});

Route::get('/lapp', [ 'as' => 'lapp.index', 'uses' => 'AppController@index']);

Route::get("/process_oauth_result",function(\Illuminate\Http\Request $request)
{
    $shopUrl = $request->shop;
    $shopify = Shopify::setShopUrl($shopUrl);
    $accessToken = Shopify::setShopUrl($shopUrl)->getAccessToken($request->code);
$shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);
$products = $shopify->get("admin/products.json", ["limit"=>20, "page" => 1]);
  dd($products);
    
    // redirect to success page or billing etc.
});
