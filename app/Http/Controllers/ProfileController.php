<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\FavouriteProfiles;

use App\Http\Controllers\UserController;

class ProfileController extends Controller {

    public function create(Request $request){
      $formFields = $request->validate([
          'profileType' => 'required',
          'contactNo' => 'required',
          'professionType' => 'required',
          'income' => 'required',
          'religion' => 'required',
          'subReligion' => 'required',
          'caste' => 'required',
          'degreeLevel' => 'required',
          'degreeType' => 'required',
          'degreeYear' => 'required',
          'institute' => 'required',
          'maritalStatus' => 'required',
          'age' => 'required',
          'complexion' => 'required',
          'weight' => 'required',
          'feet' => 'required',
          'inch' => 'required',
          'motherLanguage' => 'required',
          'requirements' => 'required',
          'jobTitle' => 'required',
          'noOfSons' => 'required',
          'noOfDaughters' => 'required',
          'userId' => 'required',
          'headType' => 'required', 
          'smoker' => 'required',
          'drinker' => 'required',
          'childProducer' => 'required', 
          'father' => 'required',
          'mother' => 'required',
          'sisters' => 'required', 
          'marriedSisters' => 'required', 
          'brothers' => 'required', 
          'marriedBrothers' => 'required', 
          'siblingNumber' => 'required', 
          'currentAddessArea' => 'required', 
          'currentAddessCity' => 'required', 
          'currentAddessCountry' => 'required', 
          'permanentAddessArea' => 'required', 
          'permanentAddessCity' => 'required', 
          'permanentAddessCountry' => 'required', 
      ]);

      if(Profile::where('userId', $formFields['userId'])->first()){
          $response = [
              'type' => 'error',
              'message' => 'Profile already exists'
          ];
          return response($response);
      } else {
        $profile = Profile::create([
          'profileType' => $formFields['profileType'],
          'contactNo' => $formFields['contactNo'],
          'professionType' => $formFields['professionType'],
          'income' => $formFields['income'],
          'religion' => $formFields['religion'],
          'subReligion' => $formFields['subReligion'],
          'caste' => $formFields['caste'],
          'degreeLevel' => $formFields['degreeLevel'],
          'degreeType' => $formFields['degreeType'],
          'degreeYear' => $formFields['degreeYear'],
          'institute' => $formFields['institute'],
          'maritalStatus' => $formFields['maritalStatus'],
          'age' => $formFields['age'],
          'complexion' => $formFields['complexion'],
          'weight' => $formFields['weight'],
          'feet' => $formFields['feet'],
          'inch' => $formFields['inch'],
          'motherLanguage' => $formFields['motherLanguage'],
          'requirements' => $formFields['requirements'],
          'jobTitle' => $formFields['jobTitle'],
          'noOfSons' => $formFields['noOfSons'],
          'noOfDaughters' => $formFields['noOfDaughters'],
          'userId' => $formFields['userId'],
          'headType' => $formFields['headType'],
          'smoker' => $formFields['smoker'], 
          'drinker' => $formFields['drinker'], 
          'childProducer' => $formFields['childProducer'], 
          'father' => $formFields['father'], 
          'mother' => $formFields['mother'],
          'sisters' => $formFields['sisters'], 
          'marriedSisters' => $formFields['marriedSisters'], 
          'brothers' => $formFields['brothers'], 
          'marriedBrothers' => $formFields['marriedBrothers'], 
          'siblingNumber' => $formFields['siblingNumber'], 
          'currentAddessArea' => $formFields['currentAddessArea'],  
          'currentAddessCity' => $formFields['currentAddessCity'],  
          'currentAddessCountry' => $formFields['currentAddessCountry'],  
          'permanentAddessArea' => $formFields['permanentAddessArea'],  
          'permanentAddessCity' => $formFields['permanentAddessCity'],  
          'permanentAddessCountry' => $formFields['permanentAddessCountry'],
        ]);
        $updateUserProfileScore = app('App\Http\Controllers\UserController')->updateProfileScore($formFields['userId']);
        $response = [
          'type' => 'success',
          'message' => 'Profile created Successfully'
        ];
        return response ($response);
      }
    }

    public function setProfileFavourite(Request $request){
        //
    }

    public function getProfileDetailsById(Request $request){
        $profileId = $request->route('id');
        $userProfile = Profile::where('userId', $profileId)->get();

        $response = [
          'type' => 'success',
          'data' => $userProfile
        ];
        return response($response);
    }

}
