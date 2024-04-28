<?php

namespace App\Livewire;

use Livewire\Component;

class LandingPage extends Component
{

    public function login(){
        return redirect()->route('login');
    }

    public function skip(){

        return redirect()->route('layout');
    }
    public function render()
    {
        return view('livewire.landing-page');
    }
}
