<?php

namespace App\Http\Livewire\Commons;

use Livewire\Component;

class Header extends Component
{
    public $title = '';

    public function render()
    {
        return view('commons.header');
    }
}
