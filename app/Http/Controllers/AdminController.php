<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify\Clients\Rest;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function products()
    {
        $client = new Rest($session->getShop(), $session->getAccessToken());
        $products = $client->get(path: 'products');

        return view('admin.products', compact('products'));
    }
}
