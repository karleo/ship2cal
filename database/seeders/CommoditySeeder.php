<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commodity;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $commodities = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and components including computers, smartphones, and consumer electronics.'
            ],
            [
                'name' => 'Textiles',
                'description' => 'Fabrics, clothing, and other textile products.'
            ],
            [
                'name' => 'Machinery',
                'description' => 'Industrial machinery, equipment, and parts.'
            ],
            [
                'name' => 'Pharmaceuticals',
                'description' => 'Medicines, medical supplies, and healthcare products.'
            ],
            [
                'name' => 'Automotive Parts',
                'description' => 'Vehicle components, spare parts, and accessories.'
            ],
            [
                'name' => 'Food Products',
                'description' => 'Processed foods, beverages, and agricultural products.'
            ],
            [
                'name' => 'Chemicals',
                'description' => 'Industrial chemicals, raw materials, and chemical compounds.'
            ],
        ];

        foreach ($commodities as $commodity) {
            Commodity::create($commodity);
        }
    }
}
