<?php

namespace App\Http\Controllers;

use App\Models\QRCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class QRCodeController extends Controller
{
    // Display form for creating or editing a QR code
    public function showForm($id = null)
    {
        $qrCode = $id ? QRCode::getQRCode($id) : [
            'destination' => 'product',
            'title' => '',
        ];

        return view('qrcodes.form', compact('qrCode'));
    }

    // Handle form submissions for creating, updating, or deleting QR codes
    public function handleAction(Request $request, $id = null)
    {
        $shop = Auth::user()->shop; // Assuming `shop` is tied to authenticated user session
        $data = array_merge($request->all(), ['shop' => $shop]);

        // Delete action
        if ($request->input('action') === 'delete' && $id) {
            QRCode::destroy($id);
            return Redirect::route('qrcodes.index')->with('status', 'QR code deleted');
        }

        // Validate data
        $errors = QRCode::validateQRCode($data);
        if ($errors) {
            return Redirect::back()->withErrors($errors)->withInput();
        }

        // Create or update QR code
        $qrCode = $id ? QRCode::find($id) : new QRCode();
        $qrCode->fill($data)->save();

        return Redirect::route('qrcodes.show', $qrCode->id)->with('status', 'QR code saved');
    }

    // Handle product selection (for product ID and details)
    public function selectProduct(Request $request)
    {
        // Implement Shopify product selection logic here
        $product = [
            'productId' => 'someProductId',
            'productVariantId' => 'someVariantId',
            'productTitle' => 'Product Title',
            'productHandle' => 'product-handle',
            'productAlt' => 'Product Alt Text',
            'productImage' => 'product-image-url',
        ];

        return response()->json($product);
    }
}
