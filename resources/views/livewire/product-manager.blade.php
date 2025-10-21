<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Products') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- Header -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Product Manager</h2>
                    <p class="text-gray-600 mt-1">Browse and filter products dynamically</p>
                </div>

                <!-- Filters -->
                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Search -->
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                            <input type="text"
                                   wire:model.live.debounce.300ms="search"
                                   id="search"
                                   placeholder="Search products..."
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <!-- Category Filter -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select wire:model.live="categoryFilter"
                                    id="category"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Min -->
                        <div>
                            <label for="priceMin" class="block text-sm font-medium text-gray-700 mb-1">Min Price</label>
                            <input type="number"
                                   wire:model.live.debounce.300ms="priceMin"
                                   id="priceMin"
                                   placeholder="0"
                                   step="0.01"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <!-- Price Max -->
                        <div>
                            <label for="priceMax" class="block text-sm font-medium text-gray-700 mb-1">Max Price</label>
                            <input type="number"
                                   wire:model.live.debounce.300ms="priceMax"
                                   id="priceMax"
                                   placeholder="1000"
                                   step="0.01"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <!-- Second Row of Filters -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <!-- Stock Filter -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock Status</label>
                            <select wire:model.live="stockFilter"
                                    id="stock"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">All Items</option>
                                <option value="in_stock">In Stock</option>
                                <option value="out_of_stock">Out of Stock</option>
                            </select>
                        </div>

                        <!-- Sort By -->
                        <div>
                            <label for="sortField" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                            <select wire:model.live="sortField"
                                    id="sortField"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="name">Name</option>
                                <option value="price">Price</option>
                                <option value="category">Category</option>
                                <option value="stock">Stock</option>
                                <option value="created_at">Date Added</option>
                            </select>
                        </div>

                        <!-- Sort Direction -->
                        <div>
                            <label for="sortDirection" class="block text-sm font-medium text-gray-700 mb-1">Direction</label>
                            <select wire:model.live="sortDirection"
                                    id="sortDirection"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center mt-4">
                        <button wire:click="clearFilters"
                                class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
                            Clear Filters
                        </button>
                        <button wire:click="toggleViewMode"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                            {{ $viewMode === 'grid' ? 'List View' : 'Grid View' }}
                        </button>
                    </div>
                </div>

                <!-- Products Display -->
                <div class="mb-6">
                    <div class="text-sm text-gray-600 mb-4">
                        Showing {{ $products->count() }} of {{ $products->total() }} products
                    </div>

                    @if($viewMode === 'grid')
                        <!-- Grid View -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @forelse($products as $product)
                                <a href="{{ route('products.show', $product->id) }}" class="border rounded-lg p-4 hover:shadow-lg transition block cursor-pointer hover:border-indigo-300">
                                    <div class="mb-3">
                                        <h3 class="font-semibold text-lg text-gray-800 truncate">{{ $product->name }}</h3>
                                        <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded mt-1">
                                            {{ $product->category }}
                                        </span>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $product->description }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-indigo-600">${{ number_format($product->price, 2) }}</span>
                                        <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $product->stock > 0 ? 'In Stock (' . $product->stock . ')' : 'Out of Stock' }}
                                        </span>
                                    </div>
                                </a>
                            @empty
                                <div class="col-span-full text-center py-12">
                                    <p class="text-gray-500 text-lg">No products found matching your criteria.</p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <!-- List View -->
                        <div class="space-y-4">
                            @forelse($products as $product)
                                <a href="{{ route('products.show', $product->id) }}" class="border rounded-lg p-4 hover:shadow-lg transition block cursor-pointer hover:border-indigo-300">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-3 mb-2">
                                                <h3 class="font-semibold text-xl text-gray-800">{{ $product->name }}</h3>
                                                <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">
                                                    {{ $product->category }}
                                                </span>
                                                <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                                    {{ $product->stock > 0 ? 'In Stock (' . $product->stock . ')' : 'Out of Stock' }}
                                                </span>
                                            </div>
                                            <p class="text-gray-600 mb-2">{{ $product->description }}</p>
                                            <p class="text-xs text-gray-400">Added: {{ $product->created_at->format('M d, Y') }}</p>
                                        </div>
                                        <div class="text-right ml-4">
                                            <span class="text-3xl font-bold text-indigo-600">${{ number_format($product->price, 2) }}</span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-12">
                                    <p class="text-gray-500 text-lg">No products found matching your criteria.</p>
                                </div>
                            @endforelse
                        </div>
                    @endif
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
