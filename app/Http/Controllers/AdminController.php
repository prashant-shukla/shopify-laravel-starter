<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Shopify\Clients\Rest;
use Shopify\Rest\Admin2023_10\Product;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function products()
    {
        
        $shop = Auth::user();
        $domain = $shop->getDomain()->toNative();
        $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];


        $products = Product::all(env("SHOPIFY_API_KEY"), $shop);

        return view('admin.products', compact('products'));
    }
}
