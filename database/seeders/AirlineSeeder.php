<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Airline;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $airlines = [
            [
                'code' => 'UAL',
                'name' => 'United Airlines',
                'country_flag' => 'USA',
                'contact_number' => '+1-800-864-8331',
                'email' => 'contact@united.com'
            ],
            [
                'code' => 'AAL',
                'name' => 'American Airlines',
                'country_flag' => 'USA',
                'contact_number' => '+1-800-433-7300',
                'email' => 'customer.service@aa.com'
            ],
            [
                'code' => 'DAL',
                'name' => 'Delta Air Lines',
                'country_flag' => 'USA',
                'contact_number' => '+1-800-221-1212',
                'email' => 'delta@delta.com'
            ],
            [
                'code' => 'BAW',
                'name' => 'British Airways',
                'country_flag' => 'UK',
                'contact_number' => '+44-20-8738-5050',
                'email' => 'customer.service@ba.com'
            ],
            [
                'code' => 'SIA',
                'name' => 'Singapore Airlines',
                'country_flag' => 'Singapore',
                'contact_number' => '+65-6223-8888',
                'email' => 'customer_affairs@singaporeair.com.sg'
            ],
        ];

        foreach ($airlines as $airline) {
            Airline::create($airline);
        }
    }
}
