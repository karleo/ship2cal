<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShipmentRate;
use App\Models\WeightRate;

class WeightRateSeeder extends Seeder
{
    public function run(): void
    {
        $shipmentRates = ShipmentRate::all();

        $weightRates = [
            ['name' => 'minimun kg', 'value' => 20],
            ['name' => 'minus 40 kg', 'value' => 35],
            ['name' => '45 + kg', 'value' => 50],
            ['name' => '100 + kg', 'value' => 100],
            ['name' => '300 + kg', 'value' => 250],
            ['name' => '500 + kg', 'value' => 550],
            ['name' => '1000 + kg', 'value' => 1150],
        ];

        foreach ($shipmentRates as $shipmentRate) {
            foreach ($weightRates as $rate) {
                WeightRate::create([
                    'shipment_rate_id' => $shipmentRate->id,
                    'name' => $rate['name'],
                    'value' => $rate['value'] + rand(-5, 5), // Add some variation
                ]);
            }
        }
    }
}
