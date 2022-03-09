<?php

namespace App\Http\Livewire\Commons;

use Livewire\Component;

class Messages extends Component
{
    public function render() //https://www.youtube.com/watch?v=_cNMKxA0wAE&t=1535s 58-1:02 y 01:17
    {
        return <<<'blade'
            <div class="w3-content w3-center w3-animate-bottom" id="messages">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <article class="w3-panel w3-padding w3-red state-message">{{ $error }}</article>
                    @endforeach
                @endif

                @if (session()->has('success'))
                    <article class="w3-panel w3-padding w3-green state-message">{{ session('success') }}</article>
                @endif

                @if (session()->has('error'))
                    <article class="w3-panel w3-padding w3-red state-message">{{ session('error') }}</article>
                @endif
            </div>
        blade;
    }
}
