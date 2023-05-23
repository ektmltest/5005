<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;

class Logout extends Component
{
    public function logout() {
        if (auth()->check()) {
            auth()->logout();
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.website.logout');
    }
}
