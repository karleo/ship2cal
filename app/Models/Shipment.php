<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    //
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

    public function rate()
    {
        return $this->hasOne(Rate::class);
    }
}
