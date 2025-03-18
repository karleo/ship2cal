<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commodity;

class CommodityController extends Controller
{
    //
    public function index()
    {
        $commodities = Commodity::all();
        return view('commodities.index', compact('commodities'));
    }

    public function create()
    {
        return view('commodities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Commodity::create($request->all());

        return redirect()->route('commodities.index')
            ->with('success', 'Commodity created successfully.');
    }

    public function show(Commodity $commodity)
    {
        return view('commodities.show', compact('commodity'));
    }

    public function edit(Commodity $commodity)
    {
        return view('commodities.edit', compact('commodity'));
    }

    public function update(Request $request, Commodity $commodity)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $commodity->update($request->all());

        return redirect()->route('commodities.index')
            ->with('success', 'Commodity updated successfully');
    }

    public function destroy(Commodity $commodity)
    {
        $commodity->delete();

        return redirect()->route('commodities.index')
            ->with('success', 'Commodity deleted successfully');
    }
}
