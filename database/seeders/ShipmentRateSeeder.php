<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShipmentRate;
use App\Models\Vendor;

class ShipmentRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $vendors = Vendor::all();

        $shipmentRates = [
            ['origin' => 'New York', 'destination' => 'Los Angeles'],
            ['origin' => 'Chicago', 'destination' => 'Miami'],
            ['origin' => 'San Francisco', 'destination' => 'Boston'],
            ['origin' => 'Seattle', 'destination' => 'Dallas'],
            ['origin' => 'Houston', 'destination' => 'Denver'],
        ];

        foreach ($shipmentRates as $rate) {
            $shipmentRate = ShipmentRate::create([
                'vendor_id' => $vendors->random()->id,
                'origin' => $rate['origin'],
                'destination' => $rate['destination'],
            ]);

            // Add charges
            $shipmentRate->charges()->createMany([
                ['type' => 'fuel', 'name' => 'Fuel Surcharge', 'amount' => rand(10, 50)],
                ['type' => 'documents', 'name' => 'Documentation Fee', 'amount' => rand(5, 20)],
                ['type' => 'label', 'name' => 'Labeling Fee', 'amount' => rand(2, 10)],
            ]);
        }
    }
}
