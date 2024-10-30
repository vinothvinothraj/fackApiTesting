<?php

namespace App\Http\Livewire\LandingPage;

use Livewire\Component;

class GetSpecificPost extends Component
{
    public function render()
    {
        return view('livewire.landing-page.get-specific-post')->layout('layouts.main');
    }
}
