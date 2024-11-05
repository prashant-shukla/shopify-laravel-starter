<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <meta name="shopify-api-key" content="41517acdd7d846a485f6ceec5a5322e9" />
    
    <script src="https://cdn.shopify.com/shopifycloud/app-bridge.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <ui-nav-menu>
            <a href="/" rel="home">Home</a>
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('admin.products') }}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700">Products</a>
        </ui-nav-menu>

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
