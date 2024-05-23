<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use App\Models\Store;

class StoreProductController extends Controller
{

    // display all products of all stores with pagination
    public function allProducts()
    {
        $products = Product::latest()->with('category')->paginate(12);
        return view('products.all', compact('products'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Store $store)
    {
        $categories = Category::all();
        $soldBy = ['kg', 'g', 'lb', 'pcs', 'units', 'each', 'ml', 'l', 'fl oz'];

        return view('products.create', compact('store', 'categories', 'soldBy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Store $store)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'photo_main' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'discount_type' => 'required|string|in:percentage,fixed',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'measure' => 'required|string|max:255',
            'sold_by' => 'required|string|max:255',
        ]);

        $product = new Product();
        $product->store_id = $store->id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->discount_type = $request->discount_type;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->measure = $request->measure;
        $product->sold_by = $request->sold_by;

        if ($request->hasFile('photo_main')) {
            $photoMain = time() . 'product.' . $request->photo_main->extension();
            $request->profile_picture->storeAs('public/products', $photoMain);

            $product->photo_main = $photoMain;
        }

        if ($request->hasFile('photo_1')) {
            $photo_1 = time() . 'product.' . $request->photo_1->extension();
            $request->profile_picture->storeAs('public/products', $photo_1);

            $product->photo_1 = $photo_1;
        }

        if ($request->hasFile('photo_2')) {
            $photo_2 = time() . 'product.' . $request->photo_2->extension();
            $request->profile_picture->storeAs('public/products', $photo_2);

            $product->photo_2 = $photo_2;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store, Product $product)
    {
        return view('products.show', compact('store', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store, Product $product)
    {
        $categories = Category::all();
        $soldby = ['kg', 'g', 'lb', 'pcs', 'units', 'each', 'ml', 'l', 'fl oz'];
        return view('products.edit', compact('store', 'product', 'categories', 'soldby'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store, Product $product)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'photo_main' => 'image',
            'photo_1' => 'image',
            'photo_2' => 'image',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'discount_type' => 'nullable|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'measure' => 'nullable|string',
            'sold_by' => 'nullable|string',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index', $store)->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store, Product $product)
    {
        $product->delete();
        return redirect()->route('products.index', $store)->with('success', 'Product deleted successfully.');
    }
}
