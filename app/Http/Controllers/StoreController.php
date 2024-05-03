<?php

namespace App\Http\Controllers;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // public function index()
    // {
        
    //     return view('store');
    // }


    public function show($storeId)
    {
        $store = Store::findOrFail($storeId);
        return view('store.store', compact('store'));
    }

    public function edit($storeId)
    {
        $store = Store::findOrFail($storeId);
        return view('store.edit', compact('store'));
    }

    public function update(Request $request, $storeId)
    {
        $store = Store::findOrFail($storeId);
        $store->update($request->all());
        return redirect()->route('store.show', $store->id)->with('success', 'Store updated successfully.');
    }

    public function addProduct(Request $request, $storeId)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $store = Store::findOrFail($storeId);

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        $store->products()->save($product);

        return redirect()->route('store.show', $store->id)->with('success', 'Product added successfully.');
    }

    public function deleteProduct($storeId, $productId)
    {
        $store = Store::findOrFail($storeId);
        $product = Product::findOrFail($productId);

        // Make sure the product belongs to the store
        if ($store->id !== $product->store_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $product->delete();

        return redirect()->route('store.show', $store->id)->with('success', 'Product deleted successfully.');
    }

}
