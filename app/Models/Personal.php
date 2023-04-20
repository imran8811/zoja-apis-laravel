<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model {
    use HasFactory;
    protected $fillable = [
        'userId',
        'contactNo',
        'caste',
        'maritalStatus',
        'noOfSons',
        'noOfDaughters',
        'motherLanguage',
    ];
}
