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

    // Middleware for the StoreController
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
        $userStores = auth()->user()->stores()->with('products', 'storeAddresses')->get();

        // Unwrap and merge all products into a single collection
        $allProducts = $userStores->flatMap(function ($store) {
            return $store->products;
        });

        // To get the top 10 selling products from all stores
        $topProducts = $allProducts->sortByDesc('units_sold')->take(10);

        return view(
            'store.store',
            [
                'stores' => $userStores,
                'topProducts' => $topProducts
            ]
        );
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $addresses = auth()->user()->addresses()->with('location')->get();

        $addresses = $addresses->map(function ($address) {
            return [
                'id' => $address->id,
                'full_address' => $address->address_line_one
                    . ', ' . $address->address_line_two
                    . ', ' . $address->city
                    . ', ' . $address->location->state
                    . ', ' . $address->location->pincode,
            ];
        });

        return view('store.create', ['addresses' => $addresses]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:stores',
            'address_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (auth()->user()->addresses->contains('id', $value) === false) {
                        $fail("The selected $attribute is invalid.");
                    }
                },
            ],
            'phone' => 'required|regex:/^[0-9]{10,12}$/|max:12',
            'days' => 'required|array',
            'days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start-time-*' => 'required|date_format:H:i',
            'end-time-*' => 'required|date_format:H:i|after:start-time-*',
        ], [
            'start-time-*' => 'The :attribute field must be a valid time format (HH:MM)',
            'end-time-*' => 'The :attribute field must be a valid time format (HH:MM) and must be after the start time',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the store
        $store = auth()->user()->stores()
            ->create([
                'name' => $request->store_name,
                'email' => $request->email,
                'address_id' => $request->address_id,
                'phone' => $request->phone,
            ]);

        // Create the business hours
        foreach ($request->days as $day) {
            $store->businessHours()->create([
                'day' => $day,
                'open_time' => $request->input("start-time-$day"),
                'close_time' => $request->input("end-time-$day"),
            ]);
        }

        // dd($store->businessHours()->get()->toArray());

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
