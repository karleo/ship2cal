<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Shipment;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::with('shipment')->get();
        return view('rates.index', compact('rates'));
    }

    public function create()
    {
        $shipments = Shipment::all();
        return view('rates.create', compact('shipments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipment_id' => 'required|exists:shipments,id',
            'base_rate' => 'required|numeric|min:0',
        ]);

        Rate::create($request->all());

        return redirect()->route('rates.index')
            ->with('success', 'Rate created successfully.');
    }

    public function show(Rate $rate)
    {
        return view('rates.show', compact('rate'));
    }

    public function edit(Rate $rate)
    {
        $shipments = Shipment::all();
        return view('rates.edit', compact('rate', 'shipments'));
    }

    public function update(Request $request, Rate $rate)
    {
        $request->validate([
            'shipment_id' => 'required|exists:shipments,id',
            'base_rate' => 'required|numeric|min:0',
        ]);

        $rate->update($request->all());

        return redirect()->route('rates.index')
            ->with('success', 'Rate updated successfully');
    }

    public function destroy(Rate $rate)
    {
        $rate->delete();

        return redirect()->route('rates.index')
            ->with('success', 'Rate deleted successfully');
    }
}
