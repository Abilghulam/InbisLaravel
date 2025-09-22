<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LayoutSearch extends Component
{
    public $type;
    public $results;
    public $keyword;

    public function __construct($type, $results = null, $keyword = null)
    {
        $this->type = $type;
        $this->results = $results;
        $this->keyword = $keyword;
    }

    public function render()
    {
        return view('components.layout-search');
    }
}
