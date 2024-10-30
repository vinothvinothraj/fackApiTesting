<?php

namespace App\Http\Livewire\LandingPage;

use Livewire\Component;

class Hero extends Component
{
    public function render()
    {
        return view('livewire.landing-page.hero')->layout('layouts.main');
    }
}
