<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'address',
        'email',
        'age',
        'height',
        'credit',
        'image_path',
    ];
}
