<?php

namespace App\Http\Controllers;

use App\Models\ShipmentRate;
use App\Models\Vendor;
use App\Models\WeightRate;
use App\Models\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShipmentRateController extends Controller
{
    public function index()
    {
        $shipmentRates = ShipmentRate::with(['vendor', 'weightRates', 'charges'])->get();
        return view('shipment_rates.index', compact('shipmentRates'));
    }

    public function create()
    {
        $vendors = Vendor::all();
        return view('shipment_rates.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'origin' => 'required',
            'destination' => 'required',
            'weight_rates.*.name' => 'required',
            'weight_rates.*.value' => 'required|numeric|min:0',
            'charges.*.type' => 'required|in:fuel,documents,label,other',
            'charges.*.name' => 'required',
            'charges.*.amount' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $shipmentRate = ShipmentRate::create([
                'vendor_id' => $request->vendor_id,
                'origin' => $request->origin,
                'destination' => $request->destination,
            ]);

            foreach ($request->weight_rates as $weightRateData) {
                $shipmentRate->weightRates()->create([
                    'name' => $weightRateData['name'],
                    'value' => $weightRateData['value'],
                ]);
            }

            foreach ($request->charges as $chargeData) {
                $shipmentRate->charges()->create([
                    'type' => $chargeData['type'],
                    'name' => $chargeData['name'],
                    'amount' => $chargeData['amount'],
                ]);
            }
        });

        return redirect()->route('shipment_rates.index')
            ->with('success', 'Shipment rate created successfully.');
    }

    public function show(ShipmentRate $shipmentRate)
    {
        $shipmentRate->load(['weightRates', 'charges']);
        return view('shipment_rates.show', compact('shipmentRate'));
    }

    public function edit(ShipmentRate $shipmentRate)
    {
        $vendors = Vendor::all();
        $shipmentRate->load(['weightRates', 'charges']);
        return view('shipment_rates.edit', compact('shipmentRate', 'vendors'));
    }

    public function update(Request $request, ShipmentRate $shipmentRate)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'origin' => 'required',
            'destination' => 'required',
            'weight_rates.*.name' => 'required',
            'weight_rates.*.value' => 'required|numeric|min:0',
            'charges.*.type' => 'required|in:fuel,documents,label,other',
            'charges.*.name' => 'required',
            'charges.*.amount' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request, $shipmentRate) {
            $shipmentRate->update([
                'vendor_id' => $request->vendor_id,
                'origin' => $request->origin,
                'destination' => $request->destination,
            ]);

            // Delete existing weight rates and charges
            $shipmentRate->weightRates()->delete();
            $shipmentRate->charges()->delete();

            // Add new weight rates
            foreach ($request->weight_rates as $weightRateData) {
                $shipmentRate->weightRates()->create([
                    'name' => $weightRateData['name'],
                    'value' => $weightRateData['value'],
                ]);
            }

            // Add new charges
            foreach ($request->charges as $chargeData) {
                $shipmentRate->charges()->create([
                    'type' => $chargeData['type'],
                    'name' => $chargeData['name'],
                    'amount' => $chargeData['amount'],
                ]);
            }
        });

        return redirect()->route('shipment_rates.index')
            ->with('success', 'Shipment rate updated successfully');
    }

    public function destroy(ShipmentRate $shipmentRate)
    {
        $shipmentRate->delete();

        return redirect()->route('shipment_rates.index')
            ->with('success', 'Shipment rate deleted successfully');
    }
}
