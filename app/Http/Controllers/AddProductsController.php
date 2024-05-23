<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class AddProductsController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // Fetch all categories to populate the dropdown
        return view('store.products.add-product-form', compact('categories'));
    }

    public function store(Request $request)
    {
        
    }
}
