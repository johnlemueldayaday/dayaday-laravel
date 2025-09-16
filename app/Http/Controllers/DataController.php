<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo;

class DataController extends Controller
{
    // Save new data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName'  => 'required|string|max:255',
        ]);

        Demo::create([
            'first_name' => $validated['firstName'],
            'last_name'  => $validated['lastName'],
        ]);

        return response()->json(['message' => 'Data saved successfully!'], 200);
    }

    // Fetch all records
    public function fetchData()
    {
        $data = Demo::all();
        return response()->json($data);
    }

    // Update a record
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName'  => 'required|string|max:255',
        ]);

        $demo = Demo::findOrFail($id);
        $demo->update([
            'first_name' => $validated['firstName'],
            'last_name'  => $validated['lastName'],
        ]);

        return response()->json(['message' => 'Data updated successfully!'], 200);
    }

    // Delete a record
    public function destroy($id)
    {
        $demo = Demo::findOrFail($id);
        $demo->delete();

        return response()->json(['message' => 'Data deleted successfully!'], 200);
    }
}
