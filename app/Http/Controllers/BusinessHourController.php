<?php

namespace App\Http\Controllers;

use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    // Method to show business hours
    public function index()
    {
        $businessHours = BusinessHour::all();
        return view('business_hours.index', compact('businessHours'));
    }

    // Method to add new business hours
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'day' => 'required|string',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i',
        ]);

        BusinessHour::create($request->all());

        return redirect()->route('business_hours.index')->with('success', 'Business hours added successfully.');
    }

    // Method to update business hours
    public function update(Request $request, BusinessHour $businessHour)
    {
        $request->validate([
            'day' => 'required|string',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i',
        ]);

        $businessHour->update($request->all());

        return redirect()->route('business_hours.index')->with('success', 'Business hours updated successfully.');
    }

    // Method to delete business hours
    public function destroy(BusinessHour $businessHour)
    {
        $businessHour->delete();
        return redirect()->route('business_hours.index')->with('success', 'Business hours deleted successfully.');
    }
}
