<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('shop') }}" class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-2xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 shadow-md hover:shadow-lg border border-gray-200 dark:border-gray-700 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                {{ __('products.back_to_products') }}
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-3xl overflow-hidden border border-gray-100 dark:border-gray-700">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                <!-- Product Image Section -->
                <div class="relative bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 dark:from-indigo-900 dark:via-purple-900 dark:to-pink-900 p-12 flex items-center justify-center" style="min-height: 600px;">
                    <!-- Decorative Elements -->
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute top-0 left-0 w-64 h-64 bg-purple-200 dark:bg-purple-800 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-30 animate-blob"></div>
                        <div class="absolute bottom-0 right-0 w-64 h-64 bg-indigo-200 dark:bg-indigo-800 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-16 shadow-2xl">
                            <svg class="w-48 h-48 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Category Badge -->
                    <div class="absolute top-8 left-8 z-20">
                        <span class="inline-block px-6 py-3 text-sm font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full shadow-xl">
                            {{ $this->getCategoryTranslation($product->category) }}
                        </span>
                    </div>
                </div>

                <!-- Product Details Section -->
                <div class="p-12 lg:p-16">
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 dark:text-gray-100 mb-6 leading-tight">
                        {{ $product->name }}
                    </h1>

                    <div class="mb-8">
                        <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">{{ __('products.price') }}</p>
                        <div class="text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">
                            ${{ number_format($product->price, 2) }}
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-10">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('products.description') }}</h3>
                        <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Stock Information -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-2xl p-8 mb-10 border-2 border-green-200 dark:border-green-800">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            {{ __('products.stock_information') }}
                        </h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ __('products.availability') }}</p>
                                <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                    {{ $product->stock }} {{ __('products.units_available') }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ __('products.status') }}</p>
                                <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                    {{ __('products.in_stock') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4 mb-10">
                        @auth
                            <a href="{{ route('dashboard') }}" class="block w-full text-center px-8 py-5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-bold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105">
                                {{ __('products.view_in_admin') }}
                            </a>
                        @else
                            <button class="w-full px-8 py-5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 font-bold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105">
                                {{ __('products.contact_for_purchase') }}
                            </button>
                        @endauth
                    </div>

                    <!-- Product Meta -->
                    <div class="pt-8 border-t-2 border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-6">{{ __('products.product_details') }}</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-4">
                                <dt class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ __('products.product_id') }}</dt>
                                <dd class="text-lg font-bold text-gray-900 dark:text-gray-100">#{{ $product->id }}</dd>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-4">
                                <dt class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ __('products.category') }}</dt>
                                <dd class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $this->getCategoryTranslation($product->category) }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
</style>
