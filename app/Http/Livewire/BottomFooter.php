<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BottomFooter extends Component
{
    public function render()
    {
        return view('livewire.bottom-footer')->layout('layouts.main');
    }
}
