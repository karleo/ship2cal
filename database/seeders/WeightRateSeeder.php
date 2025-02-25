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
            ['name' => '0-5 kg', 'value' => 20],
            ['name' => '5-10 kg', 'value' => 35],
            ['name' => '10-20 kg', 'value' => 50],
            ['name' => '20-50 kg', 'value' => 100],
            ['name' => '50+ kg', 'value' => 150],
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
