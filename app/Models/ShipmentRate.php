<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'origin',
        'destination',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function weightRates()
    {
        return $this->hasMany(WeightRate::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
}
