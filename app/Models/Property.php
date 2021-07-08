<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

class Property extends Model
{
    protected $table = "properties";

    protected $fillable = [
        'code',
        'area',
        'bedroom',
        'suite',
        'bathroom',
        'garage',
        'price',
        'description',
        'type',
        'status'
    ];

    public function address()
    {
        return $this->hasOne(address::class);
    }

    public function sale()
    {
        return $this->hasOne(Sale::class);
    }

    /*public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }*/
}
