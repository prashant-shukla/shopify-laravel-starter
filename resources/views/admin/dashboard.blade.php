<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="mb-4 text-3xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-600">Overview of recent activities and metrics.</p>
    </div>

    <!-- Quick Actions -->
    <div class="flex mb-6 space-x-4">
        <button id="open-picker" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Add New Product</button>
        <button class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">View Reports</button>
        <button class="px-4 py-2 text-white bg-purple-500 rounded-lg hover:bg-purple-600">Settings</button>
    </div>

    <script>
        document
        .getElementById('open-picker')
        .addEventListener('click', async () => {
            const selected = await shopify.resourcePicker({type: 'products'});
            console.log(selected);
        });
    </script>


    <!-- Placeholder Metric Cards -->
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold text-gray-800">Total Products</h2>
            <p class="mt-2 text-gray-500">1,234</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold text-gray-800">Active Jobs</h2>
            <p class="mt-2 text-gray-500">567</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold text-gray-800">Pending Orders</h2>
            <p class="mt-2 text-gray-500">89</p>
        </div>
    </div>

    <!-- Recent Activities Placeholder -->
    <div class="mt-8">
        <h2 class="text-2xl font-semibold text-gray-800">Recent Activities</h2>
        <ul class="mt-4 space-y-4">
            <li class="flex items-center justify-between p-4 rounded-lg bg-gray-50">
                <span class="text-gray-700">Product John Doe created a new job.</span>
                <span class="text-sm text-gray-500">2 hours ago</span>
            </li>
            <li class="flex items-center justify-between p-4 rounded-lg bg-gray-50">
                <span class="text-gray-700">Product Jane Smith completed an order.</span>
                <span class="text-sm text-gray-500">4 hours ago</span>
            </li>
        </ul>
    </div>
@endsection
