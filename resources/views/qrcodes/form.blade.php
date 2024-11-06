@extends('layouts.app')

@section('content')
<div class="page">
    <h1>{{ isset($qrCode['id']) ? 'Edit QR code' : 'Create new QR code' }}</h1>
    
    <form method="POST" action="{{ isset($qrCode['id']) ? route('qrcodes.update', $qrCode['id']) : route('qrcodes.store') }}">
        @csrf
        <input type="hidden" name="action" value="save">

        <div class="card">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $qrCode['title'] ?? '') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="card">
            <label>Product</label>
            <div>
                @if(!empty($qrCode['productId']))
                    <button type="button" onclick="selectProduct()">Change product</button>
                    <img src="{{ $qrCode['productImage'] ?? '' }}" alt="{{ $qrCode['productAlt'] ?? '' }}">
                    <p>{{ $qrCode['productTitle'] ?? '' }}</p>
                @else
                    <button type="button" onclick="selectProduct()">Select product</button>
                @endif
            </div>
            @error('productId')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="card">
            <label>Scan destination</label>
            <select name="destination">
                <option value="product" {{ old('destination', $qrCode['destination'] ?? '') == 'product' ? 'selected' : '' }}>Link to product page</option>
                <option value="cart" {{ old('destination', $qrCode['destination'] ?? '') == 'cart' ? 'selected' : '' }}>Link to checkout with product</option>
            </select>
            @error('destination')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Save</button>
    </form>

    @if(isset($qrCode['id']))
        <form method="POST" action="{{ route('qrcodes.destroy', $qrCode['id']) }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    @endif
</div>

<script>
    function selectProduct() {
        fetch("{{ route('qrcodes.selectProduct') }}")
            .then(response => response.json())
            .then(data => {
                // Update form fields with product data
                document.querySelector('input[name="productId"]').value = data.productId;
                document.querySelector('input[name="productVariantId"]').value = data.productVariantId;
                // Update other fields as necessary
            });
    }
</script>
@endsection
