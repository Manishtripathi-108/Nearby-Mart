<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){
       
        $trending = Product::where('rating',4)->take('6')->get();
        return view('home')->with('products',$trending);
    }
}
