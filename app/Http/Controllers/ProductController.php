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

    // 
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'photo_main' => 'required|string',
            'photo_1' => 'nullable|string',
            'photo_2' => 'nullable|string',
            'name' => 'required|string',
            'rating' => 'nullable|integer|min:0|max:5',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:Fixed,Percentage',
            'available' => 'required|boolean',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'units_sold' => 'nullable|integer|min:0',
            'measure' => 'required|integer|min:0',
            'sold_by' => 'required|in:kg,g,lb,pcs,units,each,ml,l,fl oz',
        ]);

        $product = Product::create(
            $request->all(),
        );

        $product->addMedia($request->file('photo_main'));
        $product->save();




        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'photo_main' => 'required|string',
            'photo_1' => 'nullable|string',
            'photo_2' => 'nullable|string',
            'name' => 'required|string',
            'rating' => 'nullable|integer|min:0|max:5',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:Fixed,Percentage',
            'available' => 'required|boolean',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'units_sold' => 'nullable|integer|min:0',
            'measure' => 'required|integer|min:0',
            'sold_by' => 'required|in:kg,g,lb,pcs,units,each,ml,l,fl oz',
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
