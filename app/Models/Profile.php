<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
    use HasFactory;
    protected $fillable = [
        'fullName',
        'profileType',
        'contactNo',
        'professionType',
        'professionTitle',
        'jobBusinessLocation',
        'income',
        'religion',
        'subReligion',
        'caste',
        'degreeLevel',
        'degreeType',
        'degreeYear',
        'institute',
        'maritalStatus',
        'age',
        'complexion',
        'weight',
        'feet',
        'inch',
        'motherLanguage',
        'requirements',
        'noOfSons',
        'noOfDaughters',
        'userId',
        'headType', 
        'smoker',
        'drinker',
        'childProducer', 
        'father',
        'mother',
        'sisters', 
        'marriedSisters', 
        'brothers', 
        'marriedBrothers', 
        'siblingNumber', 
        'currentAddessArea', 
        'currentAddessCity', 
        'currentAddessCountry', 
        'permanentAddessArea', 
        'permanentAddessCity', 
        'permanentAddessCountry',
    ];
}
