<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::with('vendor')->get();
        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        $vendors = Vendor::all();
        return view('shipments.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'origin' => 'required',
            'destination' => 'required',
        ]);

        Shipment::create($request->all());

        return redirect()->route('shipments.index')
            ->with('success', 'Shipment created successfully.');
    }

    public function show(Shipment $shipment)
    {
        return view('shipments.show', compact('shipment'));
    }

    public function edit(Shipment $shipment)
    {
        $vendors = Vendor::all();
        return view('shipments.edit', compact('shipment', 'vendors'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'origin' => 'required',
            'destination' => 'required',
        ]);

        $shipment->update($request->all());

        return redirect()->route('shipments.index')
            ->with('success', 'Shipment updated successfully');
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        return redirect()->route('shipments.index')
            ->with('success', 'Shipment deleted successfully');
    }
}
