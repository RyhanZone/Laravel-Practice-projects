<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
    protected $fillable = [
    'name',
    'email',
    'department',
    'position',
    'description',
    'photo',
];
}
