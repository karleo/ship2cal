<?php

namespace App\Http\Controllers;

use App\Models\ShipmentRate;
use App\Models\WeightRate;
use Illuminate\Http\Request;

class ShipmentCalculatorController extends Controller
{
    public function index()
    {
        $origins = ShipmentRate::distinct('origin')->pluck('origin');
        $destinations = ShipmentRate::distinct('destination')->pluck('destination');
        $weightRates = WeightRate::distinct('name')->pluck('name');

        return view('shipment_calculator.index', compact('origins', 'destinations', 'weightRates'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'weight_rate' => 'required',
        ]);

        $shipmentRates = ShipmentRate::with(['vendor', 'weightRates', 'charges'])
            ->where('origin', $request->origin)
            ->where('destination', $request->destination)
            ->whereHas('weightRates', function ($query) use ($request) {
                $query->where('name', $request->weight_rate);
            })
            ->get();

        $results = [];

        foreach ($shipmentRates as $shipmentRate) {
            $totalCost = 0;
            $appliedWeightRate = $shipmentRate->weightRates->where('name', $request->weight_rate)->first();

            // Calculate the cost based on the weight rate
            if ($appliedWeightRate) {
                $totalCost += $appliedWeightRate->value;
            }

            // Add all charges
            foreach ($shipmentRate->charges as $charge) {
                $totalCost += $charge->amount;
            }

            $results[] = [
                'vendor' => $shipmentRate->vendor,
                'shipmentRate' => $shipmentRate,
                'appliedWeightRate' => $appliedWeightRate,
                'totalCost' => $totalCost,
            ];
        }

        return view('shipment_calculator.results', compact('results', 'request'));
    }
}
