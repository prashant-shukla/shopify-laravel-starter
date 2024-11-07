<?php

namespace App\Http\Controllers;

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
        
        $session = session('shopify_session');
        if (!$session) {
            return redirect('/auth');
        }

        $products = Product::all($session->getAccessToken(), $session->getShop());

        return view('admin.products', compact('products'));
    }
}
