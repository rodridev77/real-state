<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";

    protected $fillable = [
        'street',
        'number',
        'district',
        'city',
        'property_id'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
