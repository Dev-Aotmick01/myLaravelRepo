<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalComponent extends Component
{


    public function __construct($color = null)

    {
        $this->color = $color;
    }

    public function render(): View|Closure|string
    {

        return view('components.modal-component');
    }
}
