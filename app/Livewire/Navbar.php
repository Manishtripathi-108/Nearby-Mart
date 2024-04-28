<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public function login(){
        return redirect()->route('login');
    }

    public function register(){
        return redirect()->route('register');
    }
    public function contact(){
        return redirect()->route('livewire.contact');
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
