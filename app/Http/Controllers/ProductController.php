<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;

class ProductController extends Controller
{
    // display all products of all stores with pagination
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->where('available', 1)
            ->orderBy('rating', 'desc')
            ->with('category')
            ->paginate(12);

        return view('products-search', compact('products', 'query'));
    }


    public function index(Request $request, Store $store)
    {
        $categoryId = $request->input('category');
        $categories = Category::all();

        if ($categoryId) {
            $products = Product::where('store_id', $store->id)
                                ->where('category_id', $categoryId)
                                ->get();
        } else {
            $products = Product::where('store_id', $store->id)->get();
        }

        return view('store.show', compact('store', 'products', 'categories'));
    }

    // display details of a product
    public function details(Product $product)
    {
        $reviews = $product->feedbackRatings()->with('user')->get();
        return view('product-details', compact('product', 'reviews'));
    }
}
