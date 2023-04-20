<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appearance extends Model {
    use HasFactory;
    protected $fillable = [
        'userId',
        'age',
        'complexion',
        'weight',
        'feet',
        'inch',
        'headType', 
    ];
}
