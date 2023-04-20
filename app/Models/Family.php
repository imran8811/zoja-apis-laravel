<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model {
    use HasFactory;
    protected $fillable = [
        'father',
        'mother',
        'sisters', 
        'marriedSisters', 
        'brothers', 
        'marriedBrothers', 
        'siblingNumber', 
        'userId',
    ];
}
