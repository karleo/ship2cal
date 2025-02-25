<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'company_name',
        'contact_person',
        'contact_number',
        'address',
    ];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
}
