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
use App\Models\Category;

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

    // Store Dashboard
    public function dashboard()
    {
        $userStores = auth()->user()->stores()->with('products', 'storeAddress')->get();

        // Unwrap and merge all products into a single collection
        $allProducts = $userStores->flatMap(function ($store) {
            return $store->products;
        });

        // To get the top 10 selling products from all stores
        $topProducts = $allProducts->sortByDesc('units_sold')->take(10);

        return view(
            'store.dashboard',
            [
                'stores' => $userStores,
                'topProducts' => $topProducts
            ]
        );
    }

    // Display a listing of the resource.
    public function index()
    {
        $userStores = auth()->user()->stores()->with('storeAddress')->get();

        return view(
            'store.index',
            [
                'stores' => $userStores
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
                'full_address' => $address->getFullAddressAttribute(),
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
                    if (!auth()->user()->addresses->contains('id', $value)) {
                        $fail("The selected $attribute is invalid.");
                    }
                },
            ],
            'phone' => 'required|regex:/^[0-9]{10,12}$/|max:12',
            'days' => 'required|array',
            'days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);

        foreach ($request->days as $day) {
            $validator->after(function ($validator) use ($request, $day) {
                if ($request->input("start-time-$day") >= $request->input("end-time-$day")) {
                    $validator->errors()->add("end-time-$day", "The end time must be after the start time.");
                }
            });
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the store
        $store = auth()->user()->stores()->create([
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

        return redirect()->route('store.index')->with('success', 'Store created successfully!');
    }

    // Display the specified resource.
    public function show(Store $store)
    {
        $products = $store->products()->get();
        $categories = Category::all();
        return view('store.show')->with('store', $store)->with('products', $products)->with('categories', $categories);
    }

    // Show the form for editing the specified resource.
    public function edit(Store $store)
    {
        $businessHours = $store->businessHours->mapWithKeys(function ($item) {
            return [
                $item->day => [
                    'open_time' => $item->open_time,
                    'close_time' => $item->close_time,
                ]
            ];
        })->toArray();

        $addresses = auth()->user()->addresses()->with('location')->get()->map(function ($address) {
            return [
                'id' => $address->id,
                'full_address' => $address->address_line_one
                    . ', ' . $address->address_line_two
                    . ', ' . $address->city
                    . ', ' . $address->location->state
                    . ', ' . $address->location->pincode,
            ];
        });

        return view('store.edit', [
            'addresses' => $addresses,
            'store' => $store,
            'oldBusinessHours' => array_keys($businessHours),
            'oldStartTimes' => array_column($businessHours, 'open_time'),
            'oldEndTimes' => array_column($businessHours, 'close_time'),
        ]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Store $store)
    {
        $validator = Validator::make($request->all(), [
            'store_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:stores,email,' . $store->id,
            'address_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!auth()->user()->addresses->contains('id', $value)) {
                        $fail("The selected $attribute is invalid.");
                    }
                },
            ],
            'phone' => 'required|regex:/^[0-9]{10,12}$/|max:12'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $store->update([
            'name' => $request->input('store_name'),
            'email' => $request->input('email'),
            'address_id' => $request->input('address_id'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('store.index')->with('success', 'Store updated successfully!');
    }

    // Update the business hours for the store
    public function updateBusinessHours(Request $request, Store $store)
    {
        $validator = Validator::make($request->all(), [
            'days' => 'required|array',
            'days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);

        foreach ($request->days as $day) {
            $validator->after(function ($validator) use ($request, $day) {
                if ($request->input("start-time-$day") >= $request->input("end-time-$day")) {
                    $validator->errors()->add("end-time-$day", "The end time must be after the start time.");
                }
            });
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        foreach ($request->days as $day) {
            $store->businessHours()->updateOrCreate(
                ['day' => $day],
                [
                    'open_time' => $request->input("start-time-$day"),
                    'close_time' => $request->input("end-time-$day"),
                ]
            );
        }

        return redirect()->route('store.index')->with('success', 'Business hours updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->back()->with('success', 'Store deleted successfully!');
    }
}
