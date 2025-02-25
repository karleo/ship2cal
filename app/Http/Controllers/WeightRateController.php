<?php

namespace App\Http\Controllers;

use App\Models\WeightRate;
use Illuminate\Http\Request;

class WeightRateController extends Controller
{
    public function index()
    {
        $weightRates = WeightRate::all();
        return view('weight_rates.index', compact('weightRates'));
    }

    public function create()
    {
        return view('weight_rates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric|min:0',
        ]);

        WeightRate::create($request->all());

        return redirect()->route('weight_rates.index')
            ->with('success', 'Weight rate created successfully.');
    }

    public function edit(WeightRate $weightRate)
    {
        return view('weight_rates.edit', compact('weightRate'));
    }

    public function update(Request $request, WeightRate $weightRate)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric|min:0',
        ]);

        $weightRate->update($request->all());

        return redirect()->route('weight_rates.index')
            ->with('success', 'Weight rate updated successfully');
    }

    public function destroy(WeightRate $weightRate)
    {
        $weightRate->delete();

        return redirect()->route('weight_rates.index')
            ->with('success', 'Weight rate deleted successfully');
    }
}
