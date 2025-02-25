<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Rate;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function index()
    {
        $charges = Charge::with('rate')->get();
        return view('charges.index', compact('charges'));
    }

    public function create()
    {
        $rates = Rate::all();
        return view('charges.create', compact('rates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rate_id' => 'required|exists:rates,id',
            'type' => 'required|in:fuel,documents,label,other',
            'description' => 'required',
            'amount' => 'required|numeric|min:0',
        ]);

        Charge::create($request->all());

        return redirect()->route('charges.index')
            ->with('success', 'Charge created successfully.');
    }

    public function show(Charge $charge)
    {
        return view('charges.show', compact('charge'));
    }

    public function edit(Charge $charge)
    {
        $rates = Rate::all();
        return view('charges.edit', compact('charge', 'rates'));
    }

    public function update(Request $request, Charge $charge)
    {
        $request->validate([
            'rate_id' => 'required|exists:rates,id',
            'type' => 'required|in:fuel,documents,label,other',
            'description' => 'required',
            'amount' => 'required|numeric|min:0',
        ]);

        $charge->update($request->all());

        return redirect()->route('charges.index')
            ->with('success', 'Charge updated successfully');
    }

    public function destroy(Charge $charge)
    {
        $charge->delete();

        return redirect()->route('charges.index')
            ->with('success', 'Charge deleted successfully');
    }
}
