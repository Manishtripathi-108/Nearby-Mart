<?php

namespace App\Http\Controllers;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
class StoreController extends Controller
{
    // public function index()
    // {
        
    //     return view('store');
    // }


    public function show($userId)
    {
        $store = Store::findOrFail($userId);
        return view('store.store', compact('store'));
    }

    public function edit($userId)
    {
        $store = Store::findOrFail($userId);
        return view('store.edit', compact('store'));
    }

    public function update(Request $request, $userId)
    {
        $store = Store::findOrFail($userId);
        $store->update($request->all());
        return redirect()->route('store.show', $store->id)->with('success', 'Store updated successfully.');
    }

    public function addProduct(Request $request, $userId)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required|numeric',
        // ]);

        // $store = Store::findOrFail($userId);

        // $product = new Product([
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),
        //     'price' => $request->input('price'),
        // ]);

        // $store->products()->save($product);
          
        ProductController::class->store($request);
        

        return redirect()->route('store.show')->with('success', 'Product added successfully.');
    }

    public function deleteProduct($userId, $productId)
    {
        $store = Store::findOrFail($userId);
        $product = Product::findOrFail($productId);

        // Make sure the product belongs to the store
        if ($store->id !== $product->store_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $product->delete();

        return redirect()->route('store.show', $store->id)->with('success', 'Product deleted successfully.');
    }

}
