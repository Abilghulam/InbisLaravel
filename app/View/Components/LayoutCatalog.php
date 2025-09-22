<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LayoutCatalog extends Component
{
    public $type;
    public $recommendations;
    public $promos;
    public $latest;
    public $products;

    public function __construct($type, $recommendations, $promos, $latest, $products)
    {
        $this->type = $type;
        $this->recommendations = $recommendations;
        $this->promos = $promos;
        $this->latest = $latest;
        $this->products = $products;
    }

    public function render()
    {
        return view('components.layout-catalog');
    }
}

