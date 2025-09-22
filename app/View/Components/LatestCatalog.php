<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestCatalog extends Component
{
    public $latest;

    public function __construct($latest = [])
    {
        $this->latest = $latest;
    }

    public function render(): View|Closure|string
    {
        return view('components.latest-catalog');
    }
}
