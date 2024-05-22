<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchBar extends Component
{
    public $search = "";

    public function render()
    {
        $suggests = [];

        if (strlen($this->search) >= 2) {
            $suggests = Product::select('id', 'name')
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->limit(10)
                ->get();
        }

        return view('livewire.search-bar', [
            'suggests' => $suggests
        ]);
    }
}
