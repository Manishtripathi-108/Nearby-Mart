<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'photo_main' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|string|in:percentage,amount',
            'availability' => 'required|string|in:in_stock,out_of_stock',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'units_sold' => 'nullable|integer|min:0',
            'measure' => 'nullable|string|max:255',
            'sold_by' => 'nullable|string|max:255',
        ]);

        $product = Product::create(
            $request->all(
            ),
    );
        
    $product->addMedia($request->file('photo_main'));
    $product->save();
    

     

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            
            'photo_main' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|string|in:percentage,amount',
            'availability' => 'required|string|in:in_stock,out_of_stock',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'units_sold' => 'nullable|integer|min:0',
            'measure' => 'nullable|string|max:255',
            'sold_by' => 'nullable|string|max:255',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
