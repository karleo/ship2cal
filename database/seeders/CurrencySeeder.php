<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CurrencyRate;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $currencies = [
            [
                'name' => 'US Dollar',
                'rate' => 1.0000,
                'symbol' => '$'
            ],
            [
                'name' => 'Euro',
                'rate' => 0.8500,
                'symbol' => '€'
            ],
            [
                'name' => 'British Pound',
                'rate' => 0.7200,
                'symbol' => '£'
            ],
            [
                'name' => 'Japanese Yen',
                'rate' => 110.0000,
                'symbol' => '¥'
            ],
            [
                'name' => 'Canadian Dollar',
                'rate' => 1.2500,
                'symbol' => 'C$'
            ],
            [
                'name' => 'Australian Dollar',
                'rate' => 1.3000,
                'symbol' => 'A$'
            ],
            [
                'name' => 'Swiss Franc',
                'rate' => 0.9200,
                'symbol' => 'CHF'
            ],
            [
                'name' => 'Chinese Yuan',
                'rate' => 6.4500,
                'symbol' => '¥'
            ],
            [
                'name' => 'Indian Rupee',
                'rate' => 74.5000,
                'symbol' => '₹'
            ],
            [
                'name' => 'Brazilian Real',
                'rate' => 5.2000,
                'symbol' => 'R$'
            ],
        ];

        foreach ($currencies as $currency) {
            CurrencyRate::create($currency);
        }
    }
}
