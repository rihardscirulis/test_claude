<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('shop') }}" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                {{ __('products.back_to_products') }}
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                <!-- Product Image -->
                <div class="bg-gradient-to-br from-indigo-100 to-indigo-200 dark:from-indigo-900 dark:to-indigo-800 rounded-lg flex items-center justify-center" style="min-height: 400px;">
                    <svg class="w-32 h-32 text-indigo-400 dark:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>

                <!-- Product Details -->
                <div>
                    <div class="mb-4">
                        <span class="inline-block px-3 py-1 text-sm font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-100 dark:bg-indigo-900 rounded-full">
                            {{ $this->getCategoryTranslation($product->category) }}
                        </span>
                    </div>

                    <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                        {{ $product->name }}
                    </h1>

                    <div class="text-5xl font-bold text-indigo-600 dark:text-indigo-400 mb-6">
                        ${{ number_format($product->price, 2) }}
                    </div>

                    <div class="prose dark:prose-invert max-w-none mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">{{ __('products.description') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $product->description }}</p>
                    </div>

                    <!-- Stock Information -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 mb-6">
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-3">{{ __('products.stock_information') }}</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">{{ __('products.availability') }}:</span>
                                <span class="font-semibold text-green-600 dark:text-green-400">
                                    {{ $product->stock }} {{ __('products.units_available') }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">{{ __('products.status') }}:</span>
                                <span class="font-semibold text-green-600 dark:text-green-400">
                                    {{ __('products.in_stock') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact/Action Button -->
                    <div class="space-y-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="block w-full text-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-semibold">
                                {{ __('products.view_in_admin') }}
                            </a>
                        @else
                            <button class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-semibold">
                                {{ __('products.contact_for_purchase') }}
                            </button>
                        @endauth
                    </div>

                    <!-- Product Meta -->
                    <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-3">{{ __('products.product_details') }}</h3>
                        <dl class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <dt class="text-gray-600 dark:text-gray-400">{{ __('products.product_id') }}:</dt>
                                <dd class="font-medium text-gray-900 dark:text-gray-100">#{{ $product->id }}</dd>
                            </div>
                            <div>
                                <dt class="text-gray-600 dark:text-gray-400">{{ __('products.category') }}:</dt>
                                <dd class="font-medium text-gray-900 dark:text-gray-100">{{ $this->getCategoryTranslation($product->category) }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
