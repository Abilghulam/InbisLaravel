<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCatalog extends Component
{
    public $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function render()
    {
        return view('components.product-catalog');
    }
}

