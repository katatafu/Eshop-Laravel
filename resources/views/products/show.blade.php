@extends('layouts.app')

@section('content')
<div class="h-20"> </div>
    <div class="container mt-20 px-4 sm:px-6 lg:px-8 mx-auto relative top-11">
        <!-- Back Button (Přesunuto doleva nahoře) -->
        <div class="fixed top-10 left-6 z-50">
            <a href="{{ route('products.index') }}" class="btn btn-secondary bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-md">
                Back to Products
            </a>
        </div>

        <!-- Product Details (Posunuto trochu dolů) -->
        <div class="product-details bg-white p-6 shadow-lg rounded-lg mx-auto w-full lg:w-4/5 flex justify-between">
            <!-- Product Image Section -->
            <div class="w-1/3 pr-4">
                <div class="main-image mb-6">
                    <img src="https://via.placeholder.com/600" alt="{{ $product->name }}" class="product-image mx-auto w-full h-auto object-cover rounded-lg">
                </div>
                <!-- Additional Product Images -->
                <div class="flex justify-between">
                    <img src="https://via.placeholder.com/100" alt="{{ $product->name }} - Image 1" class="w-1/4 h-24 object-cover rounded-lg">
                    <img src="https://via.placeholder.com/100" alt="{{ $product->name }} - Image 2" class="w-1/4 h-24 object-cover rounded-lg">
                    <img src="https://via.placeholder.com/100" alt="{{ $product->name }} - Image 3" class="w-1/4 h-24 object-cover rounded-lg">
                </div>
            </div>

            <!-- Product Information Section -->
            <div class="w-2/3 pl-4">
                <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{ $product->name }}</h1>
                <p class="text-lg text-gray-600 mb-4">{{ $product->description }}</p>
                <div class="flex justify-between text-lg font-medium text-gray-800">
                    <p><strong>Price: </strong>${{ $product->price }}</p>
                    <p><strong>SKU: </strong>{{ $product->sku }}</p>
                </div>
                <div class="flex justify-between text-lg font-medium text-gray-800 mt-2">
                    <p><strong>In Stock: </strong>{{ $product->in_stock }}</p>
                </div>
            </div>
        </div>

        <!-- Product Slider for Related Products -->
        <div class="mt-16">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">You may also like</h2>
            <div class="flex overflow-x-auto space-x-4 pb-6">
                @foreach($relatedProducts as $related)
                    <div class="min-w-[200px] bg-white shadow-md rounded-lg p-4">
                        <img src="https://via.placeholder.com/200" alt="{{ $related->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $related->name }}</h3>
                        <p class="text-lg text-gray-600">{{ $related->price }}</p>
                        <a href="{{ route('products.show', $related->id) }}" class="text-blue-500 hover:text-blue-600">View Product</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
