<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;

class StoreProductController extends Controller
{

    // display all products of all stores with pagination
    public function allProducts()
    {
        $products = Product::latest()->with('category')->paginate(12);
        return view('products.all', compact('products'));
    }

    // Show the form for creating a new resource.
    public function addNew()
    {
        $stores = Auth::user()->stores;
        $categories = Category::all();
        $soldBy = ['kg', 'g', 'lb', 'pcs', 'units', 'each', 'ml', 'l', 'fl oz'];

        return view(
            'products.create',
            compact('stores', 'categories', 'soldBy')
        );
    }

    // Store a newly created resource in storage.
    public function index()
    {

    }

    // Show the form for creating a new resource.
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
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|exists:categories,id',
            'photo_main' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'discount_type' => 'required|string|in:Percentage,Fixed',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'measure' => 'required|numeric',
            'sold_by' => 'required|string|max:255',
        ]);


        $product = new Product();
        $product->store_id = $request->store_id;
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
            $photo_main = $request->file('photo_main');
            $photo_main_name = time() . '_photo_main_' . $photo_main->hashName();
            $photo_main->storeAs('public/products', $photo_main_name);
            $product->photo_main = $photo_main_name;
        }

        if ($request->hasFile('photo_1')) {
            $photo_1 = $request->file('photo_1');
            $photo_1_name = time() . '_photo_1_' . $photo_1->hashName();
            $photo_1->storeAs('public/products', $photo_1_name);
            $product->photo_1 = $photo_1_name;
        }

        if ($request->hasFile('photo_2')) {
            $photo_2 = $request->file('photo_2');
            $photo_2_name = time() . '_photo_2_' . $photo_2->hashName();
            $photo_2->storeAs('public/products', $photo_2_name);
            $product->photo_2 = $photo_2_name;
        }

        $product->save();

        return redirect()->route('products.all')->with('success', 'Product added successfully.');
    }

    // Display the specified resource.
    public function show(Product $product)
    {
        $reviews = $product->feedbackRatings()->with('user')->get();
        return view('products.show', compact('product', 'reviews'));
    }

    // Show the form for editing the specified resource.
    public function edit(Product $product)
    {
        $stores = Auth::user()->stores;
        $categories = Category::all();
        $soldBy = ['kg', 'g', 'lb', 'pcs', 'units', 'each', 'ml', 'l', 'fl oz'];

        return view('products.edit', compact('stores', 'product', 'categories', 'soldBy'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|exists:categories,id',
            'photo_main' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'discount_type' => 'required|string|in:Percentage,Fixed',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'measure' => 'required|numeric',
            'sold_by' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo_main')) {
            // Delete old image if exists
            if ($product->photo_main) {
                Storage::delete('public/products/' . $product->photo_main);
            }

            $photo_main = $request->file('photo_main');
            $photo_main_name = time() . '_photo_main_' . $photo_main->hashName();
            $photo_main->storeAs('public/products', $photo_main_name);
            $validatedData['photo_main'] = $photo_main_name;
        }

        if ($request->hasFile('photo_1')) {
            if ($product->photo_1) {
                Storage::delete('public/products/' . $product->photo_1);
            }

            $photo_1 = $request->file('photo_1');
            $photo_1_name = time() . '_photo_1_' . $photo_1->hashName();
            $photo_1->storeAs('public/products', $photo_1_name);
            $validatedData['photo_1'] = $photo_1_name;
        }

        if ($request->hasFile('photo_2')) {
            if ($product->photo_2) {
                Storage::delete('public/products/' . $product->photo_2);
            }

            $photo_2 = $request->file('photo_2');
            $photo_2_name = time() . '_photo_2_' . $photo_2->hashName();
            $photo_2->storeAs('public/products', $photo_2_name);
            $validatedData['photo_2'] = $photo_2_name;
        }

        $product->update($validatedData);

        // Redirect with success message
        return redirect()->route('products.all')->with('success', 'Product updated successfully.');
    }


    // Remove the specified resource from storage.
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.all')->with('success', 'Product deleted successfully.');
    }
}
