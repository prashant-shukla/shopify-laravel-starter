<?php

namespace App\Http\Controllers;

use Shopify\Auth\OAuth;
use Shopify\Context;
use Shopify\Utils;
use Illuminate\Http\Request;

class ShopifyAuthController extends Controller
{
    public function redirectToShopify()
    {
        $shop = request('shop');
        $authUrl = OAuth::begin($shop, config('app.url') . '/auth/callback');
        return redirect($authUrl);
    }

    public function handleCallback(Request $request)
    {
        $session = OAuth::callback($request->query());

        // Store session data for API calls
        session(['shopify_session' => $session]);

        return redirect('/products');
    }
}
