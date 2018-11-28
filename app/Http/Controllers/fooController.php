<?php 
use Illuminate\Http\Request;
use Oseintow\Shopify\Shopify;
use GeoIP as GeoIP;

class Foo extends BaseController
{
    protected $shopify;

    public function __construct(Shopify $shopify)
    {
        $this->shopify = $shopify;
    }

    /*
    * returns Collection
    */
    public function getProducts(Request $request)
    {
        
        $products = $this->shopify->setShopUrl($shopUrl)
            ->setAccessToken($accessToken)
            ->get('admin/products.json');

        $products->each(function($product){
             \Log::info($product->title);
        });
    }
}
?>