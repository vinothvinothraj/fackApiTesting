<?php

namespace App\Http\Livewire\LandingPage;

use Livewire\Component;

class BlogPosts extends Component
{
    public function render()
    {
        return view('livewire.landing-page.blog-posts')->layout('layouts.main');
    }
}
