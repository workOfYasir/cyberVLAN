<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReference extends Model
{
    protected $fillable = [
        'email',
        'name',
        'user_id',
    ];
}
