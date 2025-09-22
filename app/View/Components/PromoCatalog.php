<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PromoCatalog extends Component
{
    public $promos;

    public function __construct($promos = [])
    {
        $this->promos = $promos;
    }

    public function render(): View|Closure|string
    {
        return view('components.promo-catalog');
    }
}
