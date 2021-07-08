<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class RoleUser extends Model
{
    protected $table = "role_users";

    protected $fillable = [
        'role_id',
        'user_id'
    ];
}
