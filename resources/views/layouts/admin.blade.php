<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-6">
                <h2 class="text-xl font-semibold">Admin Panel</h2>
            </div>
            <nav class="p-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.products') }}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700">Products</a>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
