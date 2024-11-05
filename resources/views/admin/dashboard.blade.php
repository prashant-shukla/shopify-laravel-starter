<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Dashboard</h1>
        <p class="text-gray-600">Overview of recent activities and metrics.</p>

        <button id="open-picker">Open resource picker</button>
        <script>
            document
            .getElementById('open-picker')
            .addEventListener('click', async () => {
                const selected = await shopify.resourcePicker({type: 'product'});
                console.log(selected);
            });
        </script>


    </div>

    <!-- Quick Actions -->
    <div class="flex space-x-4 mb-6">
        <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Add New Product</button>
        <button class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">View Reports</button>
        <button class="bg-purple-500 text-white py-2 px-4 rounded-lg hover:bg-purple-600">Settings</button>
    </div>

    <!-- Placeholder Metric Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800">Total Products</h2>
            <p class="text-gray-500 mt-2">1,234</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800">Active Jobs</h2>
            <p class="text-gray-500 mt-2">567</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800">Pending Orders</h2>
            <p class="text-gray-500 mt-2">89</p>
        </div>
    </div>

    <!-- Recent Activities Placeholder -->
    <div class="mt-8">
        <h2 class="text-2xl font-semibold text-gray-800">Recent Activities</h2>
        <ul class="mt-4 space-y-4">
            <li class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Product John Doe created a new job.</span>
                <span class="text-sm text-gray-500">2 hours ago</span>
            </li>
            <li class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Product Jane Smith completed an order.</span>
                <span class="text-sm text-gray-500">4 hours ago</span>
            </li>
        </ul>
    </div>
@endsection
