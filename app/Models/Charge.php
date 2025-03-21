<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charge extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'shipment_rate_id',
        'type',
        'name',
        'description',
        'amount',
    ];

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
}
