<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airline;

class AirlineController extends Controller
{
    //
    public function index()
    {
        $airlines = Airline::all();
        return view('airlines.index', compact('airlines'));
    }

    public function create()
    {
        return view('airlines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:3|unique:airlines',
            'name' => 'required|string|max:255',
            'country_flag' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        Airline::create($request->all());

        return redirect()->route('airlines.index')
            ->with('success', 'Airline created successfully.');
    }

    public function show(Airline $airline)
    {
        return view('airlines.show', compact('airline'));
    }

    public function edit(Airline $airline)
    {
        return view('airlines.edit', compact('airline'));
    }

    public function update(Request $request, Airline $airline)
    {
        $request->validate([
            'code' => 'required|string|max:3|unique:airlines,code,' . $airline->id,
            'name' => 'required|string|max:255',
            'country_flag' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        $airline->update($request->all());

        return redirect()->route('airlines.index')
            ->with('success', 'Airline updated successfully');
    }

    public function destroy(Airline $airline)
    {
        $airline->delete();

        return redirect()->route('airlines.index')
            ->with('success', 'Airline deleted successfully');
    }
}
