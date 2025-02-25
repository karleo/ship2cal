<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_rate_id',
        'name',
        'value',
    ];

    public function shipmentRate()
    {
        return $this->belongsTo(ShipmentRate::class);
    }
}
