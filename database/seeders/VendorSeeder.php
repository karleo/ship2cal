<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $vendors = [
            ['company_name' => 'Fast Shipping Co.', 'contact_person' => 'John Doe', 'contact_number' => '123-456-7890', 'address' => '123 Main St, City, Country'],
            ['company_name' => 'Global Logistics', 'contact_person' => 'Jane Smith', 'contact_number' => '987-654-3210', 'address' => '456 Elm St, Town, Country'],
            ['company_name' => 'Swift Carriers', 'contact_person' => 'Bob Johnson', 'contact_number' => '555-123-4567', 'address' => '789 Oak St, Village, Country'],
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
}
