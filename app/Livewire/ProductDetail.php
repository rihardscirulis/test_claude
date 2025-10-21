<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public Product $product;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.product-detail')->layout('layouts.app');
    }

    public function getCategoryTranslation($category)
    {
        $key = 'category_' . strtolower(str_replace([' ', '&'], ['_', ''], $category));
        return __('products.' . $key);
    }
}
