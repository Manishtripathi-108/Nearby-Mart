<?php 
namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;

class AddressController extends Controller
{
    /**
     * Display a listing of the addresses.
     */
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->get();
        return view('address.your-address', compact('addresses'));
    }

    /**
     * Show the form for creating a new address.
     */
    public function create()
    {
        return view('address.partials.create-new-address');
    }

    /**
     * Store a newly created address in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'pincode' => 'required|string|max:10',
            'address_line_one' => 'required|string|max:255',
            'address_line_two' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'is_default' => 'sometimes|boolean'
        ]);

        // Ensure the area exists in the locations table
        $location = Location::where('area', $request->area)->first();
        if (!$location) {
            return redirect()->back()->withErrors(['area' => 'The specified area is not valid.']);
        }

        // Store the address
        Address::create([
            'user_id' => Auth::id(),
            'location_id' => $location->id,
            'address_line_one' => $request->address_line_one,
            'address_line_two' => $request->address_line_two,
            'city' => $request->city,
            'phone' => $request->phone,
        ]);
        
        // Redirect back with success message
        return redirect()->route('addresses.index')->with('success', 'Address added successfully.');
    }

    /**
     * Set the specified address as default.
     */
    public function setDefault($id)
    {
        $user = Auth::user();
        $address = Address::where('user_id', $user->id)->findOrFail($id);

        // Unset current default address
        Address::where('user_id', $user->id)->update(['is_default' => false]);

        // Set the selected address as default
        $address->update(['is_default' => true]);

        return redirect()->route('addresses.index')->with('success', 'Default address set successfully.');
    }

    /**
     * Remove the specified address from storage.
 */
public function destroy($id)
{
    $user = Auth::user();
    $address = Address::where('user_id', $user->id)->findOrFail($id);

    $address->delete();

    return redirect()->route('addresses.index')->with('success', 'Address deleted successfully.');
}

/**
 * Show the form for editing the specified address.
 */
public function edit($id)
{
    $user = Auth::user();
    $address = Address::where('user_id', $user->id)->findOrFail($id);

    return view('address.edit', compact('address'));
}

/**
 * Update the specified address in storage.
 */
public function update(Request $request, $id)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'pincode' => 'required|string|max:10',
        'address_line_one' => 'required|string|max:255',
        'address_line_two' => 'nullable|string|max:255',
        'city' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'is_default' => 'nullable|boolean',
    ]);

    $user = Auth::user();
    $address = Address::where('user_id', $user->id)->findOrFail($id);

    // If the address is marked as default, unset the current default address
    if ($request->is_default) {
        Address::where('user_id', $user->id)->update(['is_default' => false]);
    }

    $location = Location::where('area', $request->area)->first();
    if (!$location) {
        return redirect()->back()->withErrors(['area' => 'The specified area is not valid.']);
    }

    $address->update([
        'location_id' => $location->id,
        'address_line_one' => $request->address_line_one,
        'address_line_two' => $request->address_line_two,
        'city' => $request->city,
        'phone' => $request->phone,
        'is_default' => $request->is_default ?? false,
    ]);

    return redirect()->route('addresses.index')->with('success', 'Address updated successfully.');
}
}