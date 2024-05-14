<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckStoreOwnership;
use App\Http\Middleware\CheckStoreOwner;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(CheckStoreOwner::class),
            new Middleware(CheckStoreOwnership::class, only: ['show', 'edit', 'update', 'destroy']),
        ];
    }

    // Display a listing of the resource.
    public function index()
    {
        $userStores = auth()->user()->stores;

        return view('store.store')->with('stores', $userStores);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('store.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (auth()->user()->addresses->contains('id', $value) === false) {
                        $fail("The selected $attribute is invalid.");
                    }
                },
            ],
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userID = auth()->user()->id;
        User::where('id', $userID)->stores()
            ->create($request->only(['name', 'address_id', 'phone', 'email']));

        return redirect()->route('store.index')->with('success', 'Store created successfully!');
    }

    // Display the specified resource.
    public function show(Store $store)
    {
        return view('store.show')->with('store', $store);
    }

    //  Show the form for editing the specified resource.
    public function edit(Store $store)
    {
        return view('store.edit')->with('store', $store);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Store $store)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (auth()->user()->addresses->contains('id', $value) === false) {
                        $fail("The selected $attribute is invalid.");
                    }
                },
            ],
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $store->update($request->only(['name', 'address_id', 'phone', 'email']));

        return redirect()->back()->with('success', 'Store updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->back()->with('success', 'Store deleted successfully!');
    }
}
