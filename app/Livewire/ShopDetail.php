<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShopDetail extends Component
{
    public Product $product;

    public function mount($id)
    {
        $this->product = Product::where('is_active', true)
                                ->where('stock', '>', 0)
                                ->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.shop-detail')->layout('layouts.public');
    }

    public function getCategoryTranslation($category)
    {
        $key = 'category_' . strtolower(str_replace([' ', '&'], ['_', ''], $category));
        return __('products.' . $key);
    }
}
