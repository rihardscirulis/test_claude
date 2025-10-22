<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 dark:from-indigo-900 dark:via-purple-900 dark:to-pink-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">
                    {{ __('products.shop') }}
                </h1>
                <p class="text-xl text-indigo-100 max-w-2xl mx-auto">
                    {{ __('products.browse_our_products') }}
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Filters -->
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl p-8 mb-12 border border-gray-100 dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                        {{ __('products.search') }}
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text"
                               wire:model.live.debounce.300ms="search"
                               id="search"
                               placeholder="{{ __('products.search_placeholder') }}"
                               class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                    </div>
                </div>

                <!-- Category Filter -->
                <div>
                    <label for="category" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                        {{ __('products.category') }}
                    </label>
                    <select wire:model.live="categoryFilter"
                            id="category"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                        <option value="">{{ __('products.all_categories') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}">{{ $this->getCategoryTranslation($category) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Min -->
                <div>
                    <label for="priceMin" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                        {{ __('products.min_price') }}
                    </label>
                    <input type="number"
                           wire:model.live.debounce.300ms="priceMin"
                           id="priceMin"
                           placeholder="$0"
                           step="0.01"
                           class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                </div>

                <!-- Price Max -->
                <div>
                    <label for="priceMax" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">
                        {{ __('products.max_price') }}
                    </label>
                    <input type="number"
                           wire:model.live.debounce.300ms="priceMax"
                           id="priceMax"
                           placeholder="$1000"
                           step="0.01"
                           class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 gap-4">
                <button wire:click="clearFilters" class="inline-flex items-center px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition font-medium">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    {{ __('products.clear_filters') }}
                </button>

                <div class="flex items-center space-x-3">
                    <label class="text-sm font-bold text-gray-700 dark:text-gray-300">{{ __('products.sort_by') }}:</label>
                    <select wire:model.live="sortField" class="px-4 py-2 rounded-xl border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white font-medium">
                        <option value="name">{{ __('products.name') }}</option>
                        <option value="price">{{ __('products.price') }}</option>
                        <option value="category">{{ __('products.category') }}</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-12">
                @foreach($products as $product)
                    <a href="{{ route('shop.show', $product->id) }}" class="group">
                        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700 transform hover:-translate-y-2">
                            <!-- Product Image with Gradient -->
                            <div class="relative h-64 bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 dark:from-indigo-900 dark:via-purple-900 dark:to-pink-900 flex items-center justify-center overflow-hidden group-hover:bg-gradient-to-br group-hover:from-indigo-200 group-hover:via-purple-200 group-hover:to-pink-200 dark:group-hover:from-indigo-800 dark:group-hover:via-purple-800 dark:group-hover:to-pink-800 transition-all duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                <!-- Decorative Circle -->
                                <div class="absolute top-0 right-0 w-32 h-32 bg-white/20 rounded-full -mr-16 -mt-16"></div>
                                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>

                                <svg class="w-28 h-28 text-indigo-400 dark:text-indigo-600 relative z-10 group-hover:scale-125 group-hover:rotate-6 transition-all duration-500 filter drop-shadow-xl" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>

                                <!-- Category Badge -->
                                <div class="absolute top-4 left-4 z-20">
                                    <span class="inline-block px-4 py-2 text-xs font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-300">
                                        {{ $this->getCategoryTranslation($product->category) }}
                                    </span>
                                </div>

                                <!-- Quick View Badge -->
                                <div class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="text-white font-bold text-sm">Quick View</span>
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition mb-3 line-clamp-2">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2 leading-relaxed">
                                    {{ $product->description }}
                                </p>

                                <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                                    <div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">{{ __('products.price') }}</p>
                                        <span class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">{{ __('products.stock') }}</p>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $product->stock }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        @else
            <!-- No Products -->
            <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg p-16 text-center border border-gray-100 dark:border-gray-700">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">{{ __('products.no_products_found') }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">{{ __('products.try_different_filters') }}</p>
                    <button wire:click="clearFilters" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition font-bold shadow-lg">
                        {{ __('products.clear_filters') }}
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
