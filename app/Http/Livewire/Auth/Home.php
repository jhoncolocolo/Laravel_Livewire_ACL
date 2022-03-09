<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('auth.home')
                ->extends('layouts.default', [
                    'pagetitle' => 'Main page',
                    'title' => 'Home'
                ])
                ->section('main');
    }
}
