<!-- resources/views/admin/products.blade.php -->
@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Products</h1>
        <p class="text-gray-600">Manage all products in the application.</p>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <form class="flex items-center">
            <input
                type="text"
                placeholder="Search products..."
                class="w-full p-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
            />
            <button type="submit" class="ml-3 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Search
            </button>
        </form>
    </div>

    <!-- Products Table with Placeholder Data -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md mt-6">
        <table class="min-w-full bg-white rounded-lg">
            <thead>
                <tr class="w-full bg-gray-800 text-gray-300">
                    <th class="p-4 text-left font-semibold">ID</th>
                    <th class="p-4 text-left font-semibold">Name</th>
                    <th class="p-4 text-left font-semibold">Category</th>
                    <th class="p-4 text-left font-semibold">Price</th>
                    <th class="p-4 text-left font-semibold">Stock</th>
                    <th class="p-4 text-left font-semibold">Actions</th>
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
                        <button class="text-red-500 hover:underline ml-2">Delete</button>
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
                        <button class="text-red-500 hover:underline ml-2">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Pagination Placeholder -->
    <div class="mt-4 flex justify-between items-center">
        <button class="bg-gray-200 text-gray-700 py-1 px-4 rounded hover:bg-gray-300">Previous</button>
        <button class="bg-gray-200 text-gray-700 py-1 px-4 rounded hover:bg-gray-300">Next</button>
    </div>
@endsection
