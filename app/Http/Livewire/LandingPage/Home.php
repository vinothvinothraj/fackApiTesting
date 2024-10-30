<?php

namespace App\Http\Livewire\LandingPage;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.landing-page.home')->layout('layouts.main');
    }
}
