<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100">{{ __('products.shop') }}</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ __('products.browse_our_products') }}</p>
        </div>

        <!-- Filters -->
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('products.search') }}</label>
                    <input type="text"
                           wire:model.live.debounce.300ms="search"
                           id="search"
                           placeholder="{{ __('products.search_placeholder') }}"
                           class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Category Filter -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('products.category') }}</label>
                    <select wire:model.live="categoryFilter"
                            id="category"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">{{ __('products.all_categories') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}">{{ $this->getCategoryTranslation($category) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Min -->
                <div>
                    <label for="priceMin" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('products.min_price') }}</label>
                    <input type="number"
                           wire:model.live.debounce.300ms="priceMin"
                           id="priceMin"
                           placeholder="0"
                           step="0.01"
                           class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Price Max -->
                <div>
                    <label for="priceMax" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ __('products.max_price') }}</label>
                    <input type="number"
                           wire:model.live.debounce.300ms="priceMax"
                           id="priceMax"
                           placeholder="1000"
                           step="0.01"
                           class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </div>

            <div class="flex justify-between items-center mt-4">
                <button wire:click="clearFilters" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                    {{ __('products.clear_filters') }}
                </button>

                <div class="flex items-center space-x-2">
                    <label class="text-sm text-gray-700 dark:text-gray-300">{{ __('products.sort_by') }}:</label>
                    <select wire:model.live="sortField" class="text-sm rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="name">{{ __('products.name') }}</option>
                        <option value="price">{{ __('products.price') }}</option>
                        <option value="category">{{ __('products.category') }}</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-6">
                @foreach($products as $product)
                    <a href="{{ route('shop.show', $product->id) }}" class="group">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-lg transition duration-300 overflow-hidden">
                            <!-- Product Image Placeholder -->
                            <div class="h-48 bg-gradient-to-br from-indigo-100 to-indigo-200 dark:from-indigo-900 dark:to-indigo-800 flex items-center justify-center">
                                <svg class="w-20 h-20 text-indigo-400 dark:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>

                            <!-- Product Info -->
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-100 dark:bg-indigo-900 rounded">
                                        {{ $this->getCategoryTranslation($product->category) }}
                                    </span>
                                </div>

                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition mb-2">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-3 line-clamp-2">
                                    {{ $product->description }}
                                </p>

                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ __('products.in_stock') }}: {{ $product->stock }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        @else
            <!-- No Products -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-12 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('products.no_products_found') }}</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ __('products.try_different_filters') }}</p>
            </div>
        @endif
    </div>
</div>
