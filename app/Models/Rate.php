<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'base_rate',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
}
