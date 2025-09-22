<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RecommendationCatalog extends Component
{
    public $recommendations;

    public function __construct($recommendations)
    {
        $this->recommendations = $recommendations;
    }

    public function render()
    {
        return view('components.recommendation-catalog');
    }
}


