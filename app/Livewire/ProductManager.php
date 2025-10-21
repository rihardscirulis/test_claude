<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductManager extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryFilter = '';
    public $priceMin = '';
    public $priceMax = '';
    public $stockFilter = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $viewMode = 'grid'; // grid or list

    protected $queryString = [
        'search' => ['except' => ''],
        'categoryFilter' => ['except' => ''],
        'sortField' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategoryFilter()
    {
        $this->resetPage();
    }

    public function updatingPriceMin()
    {
        $this->resetPage();
    }

    public function updatingPriceMax()
    {
        $this->resetPage();
    }

    public function updatingStockFilter()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function clearFilters()
    {
        $this->reset(['search', 'categoryFilter', 'priceMin', 'priceMax', 'stockFilter']);
        $this->resetPage();
    }

    public function toggleViewMode()
    {
        $this->viewMode = $this->viewMode === 'grid' ? 'list' : 'grid';
    }

    public function render()
    {
        $query = Product::query();

        // Search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Category filter
        if ($this->categoryFilter) {
            $query->where('category', $this->categoryFilter);
        }

        // Price range filter
        if ($this->priceMin !== '') {
            $query->where('price', '>=', $this->priceMin);
        }

        if ($this->priceMax !== '') {
            $query->where('price', '<=', $this->priceMax);
        }

        // Stock filter
        if ($this->stockFilter === 'in_stock') {
            $query->where('stock', '>', 0);
        } elseif ($this->stockFilter === 'out_of_stock') {
            $query->where('stock', '=', 0);
        }

        // Active filter
        $query->where('is_active', true);

        // Sorting
        $query->orderBy($this->sortField, $this->sortDirection);

        $products = $query->paginate(12);
        $categories = Product::distinct()->pluck('category');

        return view('livewire.product-manager', [
            'products' => $products,
            'categories' => $categories,
        ])->layout('layouts.app');
    }
}
