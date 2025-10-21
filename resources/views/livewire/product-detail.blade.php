<x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
        <a href="{{ route('products') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Products
        </a>
    </div>
</x-slot>

<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8">
                <!-- Product Header -->
                <div class="border-b pb-6 mb-6">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                            <div class="flex items-center gap-3">
                                <span class="inline-block px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">
                                    {{ $product->category }}
                                </span>
                                @if($product->is_active)
                                    <span class="inline-block px-3 py-1 text-sm bg-green-100 text-green-800 rounded-full">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-block px-3 py-1 text-sm bg-red-100 text-red-800 rounded-full">
                                        Inactive
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="text-right ml-6">
                            <div class="text-4xl font-bold text-indigo-600">
                                ${{ number_format($product->price, 2) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Stock Information -->
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            Stock Information
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Available Quantity:</span>
                                <span class="font-semibold text-lg {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->stock }} units
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Status:</span>
                                <span class="font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </div>
                            @if($product->stock > 0 && $product->stock <= 10)
                                <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-md">
                                    <p class="text-sm text-yellow-800 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        Low Stock Warning
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Pricing Information -->
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Pricing Details
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Unit Price:</span>
                                <span class="font-semibold text-lg text-gray-900">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Category:</span>
                                <span class="font-semibold text-gray-900">
                                    {{ $product->category }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Total Value:</span>
                                <span class="font-semibold text-lg text-indigo-600">
                                    ${{ number_format($product->price * $product->stock, 2) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                        </svg>
                        Description
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $product->description ?? 'No description available for this product.' }}
                    </p>
                </div>

                <!-- Metadata -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Additional Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Product ID:</span>
                            <span class="font-mono text-sm bg-white px-3 py-1 rounded border">
                                #{{ $product->id }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Date Added:</span>
                            <span class="font-semibold text-gray-900">
                                {{ $product->created_at->format('M d, Y') }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="font-semibold text-gray-900">
                                {{ $product->updated_at->format('M d, Y') }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Time Since Added:</span>
                            <span class="font-semibold text-gray-900">
                                {{ $product->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex gap-4">
                    <a href="{{ route('products') }}"
                       class="flex-1 inline-flex justify-center items-center px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to All Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
