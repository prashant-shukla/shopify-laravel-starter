<!-- resources/views/admin/products.blade.php -->
@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="mb-6">
        <h1 class="mb-4 text-3xl font-bold text-gray-800">Products</h1>
        <p class="text-gray-600">Manage all products in the application.</p>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <form class="flex items-center">
            <input
                type="text"
                placeholder="Search products..."
                class="w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            />
            <button type="submit" class="px-4 py-2 ml-3 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Search
            </button>
        </form>
    </div>

    <!-- Products Table with Placeholder Data -->
    <div class="mt-6 overflow-x-auto bg-white rounded-lg shadow-md">
        <?php dd($products); ?>
        <table class="min-w-full bg-white rounded-lg">
            <thead>
                <tr class="w-full text-gray-300 bg-gray-800">
                    <th class="p-4 font-semibold text-left">ID</th>
                    <th class="p-4 font-semibold text-left">Name</th>
                    <th class="p-4 font-semibold text-left">Category</th>
                    <th class="p-4 font-semibold text-left">Price</th>
                    <th class="p-4 font-semibold text-left">Stock</th>
                    <th class="p-4 font-semibold text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <!-- Placeholder Rows for Products -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="p-4">1</td>
                    <td class="p-4">Product A</td>
                    <td class="p-4">Category 1</td>
                    <td class="p-4">$10.00</td>
                    <td class="p-4">In Stock</td>
                    <td class="p-4">
                        <button class="text-blue-500 hover:underline">Edit</button>
                        <button class="ml-2 text-red-500 hover:underline">Delete</button>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="p-4">2</td>
                    <td class="p-4">Product B</td>
                    <td class="p-4">Category 2</td>
                    <td class="p-4">$15.00</td>
                    <td class="p-4">Out of Stock</td>
                    <td class="p-4">
                        <button class="text-blue-500 hover:underline">Edit</button>
                        <button class="ml-2 text-red-500 hover:underline">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Pagination Placeholder -->
    <div class="flex items-center justify-between mt-4">
        <button class="px-4 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Previous</button>
        <button class="px-4 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Next</button>
    </div>
@endsection
