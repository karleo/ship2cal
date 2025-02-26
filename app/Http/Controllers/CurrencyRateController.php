<?php

namespace App\Http\Controllers;

use App\Models\CurrencyRate;
use Illuminate\Http\Request;

class CurrencyRateController extends Controller
{
    public function index()
    {
        $currencies = CurrencyRate::all();
        return view('currencies.index', compact('currencies'));
    }

    public function create()
    {
        return view('currencies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:0',
            'symbol' => 'required|string|max:10',
        ]);

        CurrencyRate::create($request->all());

        return redirect()->route('currencies.index')
            ->with('success', 'Currency created successfully.');
    }

    public function edit(CurrencyRate $currency)
    {
        return view('currencies.edit', compact('currency'));
    }

    public function update(Request $request, CurrencyRate $currency)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:0',
            'symbol' => 'required|string|max:10',
        ]);

        $currency->update($request->all());

        return redirect()->route('currencies.index')
            ->with('success', 'Currency updated successfully');
    }

    public function destroy(CurrencyRate $currency)
    {
        $currency->delete();

        return redirect()->route('currencies.index')
            ->with('success', 'Currency deleted successfully');
    }
}
