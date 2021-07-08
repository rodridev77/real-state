<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

class Client extends Model
{
    protected $table = "clients";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'cpf',
        'phone',
        'address',
        'email',
    ];

    public function sales()
    { 
        return $this->hasOne(Sale::class, 'client_id', 'id');
    }
}
