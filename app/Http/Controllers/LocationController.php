<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Method to show a location
    public function show($locationId)
    {
        $location = Address::findOrFail($locationId);
        return view('location.show', compact('location'));
    }

    // Method to edit a location
    public function edit($locationId)
    {
        $location = Address::findOrFail($locationId);
        return view('location.edit', compact('location'));
    }

    // Method to update a location
    public function update(Request $request, $locationId)
    {
        $location = Address::findOrFail($locationId);
        $location->update($request->all());
        return redirect()->route('location.show', $location->id)->with('success', 'Location updated successfully.');
    }

    // Method to delete a location
    public function destroy($locationId)
    {
        $location = Address::findOrFail($locationId);
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
