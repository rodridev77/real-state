<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
use App\Models\Client;

class Sale extends Model
{
    protected $table = "sales";

    protected $fillable = [
        'price',
        'status',
        'sale_date',
        'property_id',
        'client_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function clients()
    {  
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
