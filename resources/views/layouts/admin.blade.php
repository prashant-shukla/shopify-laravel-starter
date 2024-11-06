<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <meta name="shopify-api-key" content="{{ env("SHOPIFY_API_KEY") }}" />
    
    <script src="https://cdn.shopify.com/shopifycloud/app-bridge.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="text-gray-900 bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <ui-nav-menu>
            <a href="/" rel="home">Home</a>
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('admin.products') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Products</a>

            <a href="{{ route('questions') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Questions</a>
            <a href="{{ route('add-questions') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Add Question</a>

            <a href="{{ route('qrcodes.form') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">QR Codes</a>
        
        </ui-nav-menu>

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
