<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalCatalog extends Component
{
    public function render()
    {
        // Pastikan path view ini cocok dengan file blade di resources/views/components/modal-catalog.blade.php
        return view('components.modal-catalog');
    }
}
