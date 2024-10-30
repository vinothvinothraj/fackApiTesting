<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TopNavigationBar extends Component
{
    public function render()
    {
        return view('livewire.top-navigation-bar')->layout('layouts.main');
    }
}
