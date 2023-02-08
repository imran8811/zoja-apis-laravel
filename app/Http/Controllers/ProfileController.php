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
          'fullName' => 'required',
          'profileType' => 'required',
          'contactNo' => 'required',
          'professionType' => 'required',
          'professionTitle' => 'required',
          'jobBusinessLocation' => 'required',
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
          'fullName' => $formFields['fullName'],
          'profileType' => $formFields['profileType'],
          'contactNo' => $formFields['contactNo'],
          'professionType' => $formFields['professionType'],
          'professionTitle' => $formFields['professionTitle'],
          'jobBusinessLocation' => $formFields['jobBusinessLocation'],
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
          'profileScore' => 80,
          'message' => 'Profile created Successfully'
        ];
        return response ($response);
      }
    }

    public function updateProfileScore($id){
      $updateProfileScore = User::where('id', $id)->update(['profileSCore' => 80]);
      if($updateProfileScore) {
        return true;
      } else {
        return false;
      }
    }

    public function setProfileFavourite(Request $request){
        //
    }

    public function getProfileById(Request $request){
        $profileId = $request->route('id');
        $userProfile = Profile::where('userId', $profileId)->get();

        $response = [
          'type' => 'success',
          'data' => $userProfile
        ];
        return response($response);
    }

    public function updateProfileById(Request $request){
      $profileId = $request->route('id');

      $updateFields = [
        'fullName' => $request->fullName,
        'profileType' => $request->profileType,
        'contactNo' => $request->contactNo,
        'professionType' => $request->professionType,
        'professionTitle' => $request->professionTitle,
        'jobBusinessLocation' => $request->jobBusinessLocation,
        'income' => $request->income,
        'religion' => $request->religion,
        'subReligion' => $request->subReligion,
        'caste' => $request->caste,
        'degreeLevel' => $request->degreeLevel,
        'degreeType' => $request->degreeType,
        'degreeYear' => $request->degreeYear,
        'institute' => $request->institute,
        'maritalStatus' => $request->maritalStatus,
        'age' => $request->age,
        'complexion' => $request->complexion,
        'weight' => $request->weight,
        'feet' => $request->feet,
        'inch' => $request->inch,
        'motherLanguage' => $request->motherLanguage,
        'requirements' => $request->requirements,
        'noOfSons' => $request->noOfSons,
        'noOfDaughters' => $request->noOfDaughters,
        'userId' => $request->userId,
        'headType' => $request->headType,
        'smoker' => $request->smoker, 
        'drinker' => $request->drinker, 
        'childProducer' => $request->childProducer, 
        'father' => $request->father, 
        'mother' => $request->mother,
        'sisters' => $request->sisters, 
        'marriedSisters' => $request->marriedSisters, 
        'brothers' => $request->brothers, 
        'marriedBrothers' => $request->marriedBrothers, 
        'siblingNumber' => $request->siblingNumber, 
        'currentAddessArea' => $request->currentAddessArea,  
        'currentAddessCity' => $request->currentAddessCity,  
        'currentAddessCountry' => $request->currentAddessCountry,  
        'permanentAddessArea' => $request->permanentAddessArea,  
        'permanentAddessCity' => $request->permanentAddessCity,  
        'permanentAddessCountry' => $request->permanentAddessCountry,
      ];
      $userProfile = Profile::where('userId', $profileId)->update($updateFields);
      if($userProfile === 1){
        $response = [
          'type' => 'success',
          'message' => 'Profile updated successfully'
        ];
        return response($response);
      } else {
        $response = [
          'type' => 'error',
          'message' => 'Unable to update profile, try later'
        ];
        return response($response, 401);
      }
    }

    public function deleteProfileById($id){
      $profileDeleted = Profile::where('userId', $id)->delete();
      if($profileDeleted === 1){
          $response = [
              'type' => 'success',
              'message' => 'User deleted successfuly'
          ];
          return response($userDeleted);
      } else {
          $response = [
              'type' => 'error',
              'message' => 'Unable to delete profile, try later'
          ];
          return response($response);
      }
    }
}
