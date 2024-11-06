<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Endroid\QrCode\QrCode as QrCodeGenerator;

class QRCode extends Model
{
    protected $table = 'qrcodes';

    protected $fillable = [
        'title',
        'shop',
        'productId',
        'productHandle',
        'productVariantId',
        'destination',
        'scans',
        'createdAt',
    ];

    public $timestamps = false; // createdAt is handled in migration

    // Get a single QR code by ID and supplement with additional data
    public static function getQRCode($id)
    {
        $qrCode = self::find($id);

        if (!$qrCode) {
            return null;
        }

        return $qrCode->supplementQRCode();
    }

    // Get all QR codes for a shop and supplement with additional data
    public static function getQRCodes($shop)
    {
        $qrCodes = self::where('shop', $shop)->orderByDesc('id')->get();

        if ($qrCodes->isEmpty()) {
            return [];
        }

        return $qrCodes->map(fn($qrCode) => $qrCode->supplementQRCode())->toArray();
    }

    // Generate QR code image as a data URL
    public function getQRCodeImage()
    {
        $url = URL::to("/qrcodes/{$this->id}/scan");
        $qrCode = new QrCodeGenerator($url);
        return $qrCode->writeDataUri();
    }

    // Generate destination URL based on the QR code's destination type
    public function getDestinationUrl()
    {
        if ($this->destination === 'product') {
            return "https://{$this->shop}/products/{$this->productHandle}";
        }

        if (preg_match('/gid:\/\/shopify\/ProductVariant\/([0-9]+)/', $this->productVariantId, $matches)) {
            return "https://{$this->shop}/cart/{$matches[1]}:1";
        }

        throw new \Exception("Unrecognized product variant ID");
    }

    // Supplement QR code with additional product data from Shopify GraphQL API
    public function supplementQRCode()
    {
        $qrCodeImage = $this->getQRCodeImage();

        $response = Http::post(env('SHOPIFY_GRAPHQL_ENDPOINT'), [
            'query' => '
                query ($id: ID!) {
                    product(id: $id) {
                        title
                        images(first: 1) {
                            nodes {
                                altText
                                url
                            }
                        }
                    }
                }
            ',
            'variables' => ['id' => $this->productId],
        ]);

        $data = $response->json('data.product');

        return [
            ...$this->toArray(),
            'productDeleted' => empty($data['title']),
            'productTitle' => $data['title'] ?? null,
            'productImage' => $data['images']['nodes'][0]['url'] ?? null,
            'productAlt' => $data['images']['nodes'][0]['altText'] ?? null,
            'destinationUrl' => $this->getDestinationUrl(),
            'image' => $qrCodeImage,
        ];
    }

    // Validate QR code data and return any errors
    public static function validateQRCode($data)
    {
        $errors = [];

        if (empty($data['title'])) {
            $errors['title'] = 'Title is required';
        }

        if (empty($data['productId'])) {
            $errors['productId'] = 'Product is required';
        }

        if (empty($data['destination'])) {
            $errors['destination'] = 'Destination is required';
        }

        return $errors ?: null;
    }
}
