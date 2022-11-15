<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
    use HasFactory;
    protected $fillable = [
        'contactNo',
        'professionType',
        'income',
        'religion',
        'caste',
        'degreeLevel',
        'institute',
        'country',
        'city',
        'status',
        'age',
        'complexion',
        'weight',
        'feet',
        'inch',
        'motherLanguage',
        'requirements',
        'jobTitle',
        'noOfSons',
        'noOfDaughters',
        'userId'
    ];
}
