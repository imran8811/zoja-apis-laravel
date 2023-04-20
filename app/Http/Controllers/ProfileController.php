<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Personal;
use App\Models\Profession;
use App\Models\Education;
use App\Models\Religion;
use App\Models\Appearance;
use App\Models\Location;
use App\Models\Family;
use App\Models\Others;

use App\Http\Controllers\UserController;

class ProfileController extends Controller {

    public function create(Request $request){
      if($request->step === 'login'){
        $formFields = $request->validate([
          'fullName' => 'required | string',
          'gender' => 'required | string',
          'email' => 'required | string | unique:users',
          'password' => 'required',
        ]);
        $response = $this->createStepLogin($formFields);
        return response($response);
      } else if($request->step === 'personal'){
        $formFields = $request->validate([
          'contactNo' => 'required',
          'caste' => 'required',
          'motherLanguage' => 'required',
          'maritalStatus' => 'required',
        ]);
        $response = $this->createStepPersonal($formFields);
        return response($response);
      } else if($request->step === 'profession'){
        $formFields = $request->validate([
          'professionType' => 'required',
          'professionTitle' => 'required',
          'income' => 'required',
        ]);
        $response = $this->createStepProfession($formFields);
        return response($response);
      } else if($request->step === 'education'){
        $formFields = $request->validate([
          'degreeLevel' => 'required',
          'degreeType' => 'required',
          'degreeYear' => 'required',
          'institute' => 'required',
        ]);
        $response = $this->createStepEducation($formFields);
        return response($response);
      } else if($request->step === 'religion'){
        $formFields = $request->validate([
          'religion' => 'required',
          'subReligion' => 'required',
        ]);
        $response = $this->createStepReligion($formFields);
        return response($response);
      } else if($request->step === 'appearance'){
        $formFields = $request->validate([
          'age' => 'required',
          'complexion' => 'required',
          'weight' => 'required',
          'feet' => 'required',
          'inch' => 'required',
          'headType' => 'required', 
        ]);
        $response = $this->createStepAppearance($formFields);
        return response($response);
      } else if($request->step === 'location'){
        $formFields = $request->validate([
          'currentAddessArea' => 'required', 
          'currentAddessCity' => 'required', 
          'currentAddessCountry' => 'required', 
          'permanentAddessArea' => 'required', 
          'permanentAddessCity' => 'required', 
          'permanentAddessCountry' => 'required', 
        ]);
        $response = $this->createStepLocation($formFields);
        return response($response);
      } else if($request->step === 'family'){
        $formFields = $request->validate([ 
          'father' => 'required',
          'mother' => 'required',
          'sisters' => 'required', 
          'marriedSisters' => 'required', 
          'brothers' => 'required', 
          'marriedBrothers' => 'required', 
          'siblingNumber' => 'required', 
        ]);
        $response = $this->createStepFamily($formFields);
        return response($response);
      } else if($request->step === 'others'){
        $formFields = $request->validate([
          'requirements' => 'required',
          'smoker' => 'required',
          'drinker' => 'required',
          'childProducer' => 'required',
        ]);
        $response = $this->createStepOthers($formFields);
        return response($response);
      }
    }

    public function updateProfileScore($id, $score){
      $updateProfileScore = User::where('id', $id)->update(['profileSCore' => $score]);
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
        this.updateProfileScore($id, 0);
        $response = [
            'type' => 'success',
            'message' => 'User deleted successfuly'
        ];
        return response($response);
      } else {
          $response = [
              'type' => 'error',
              'message' => 'Unable to delete profile, try later'
          ];
          return response($response);
      }
    }

    public function createStepLogin($loginData){
      $user = User::create([
        'fullName' => $loginData['fullName'],
        'gender' => $loginData['gender'],
        'email' => $loginData['email'],
        'password' => bcrypt($loginData['password']),
        'profileScore' => 20
      ]);
      $token = $user->createToken('myapptoken')->plainTextToken;
      $response = [
          'type' => 'success',
          'token' => $token,
          'user' => $user
      ];
      return $response;
    }
    public function createStepPersonal($personalData){
      $personal = Personal::create($personalData);
      $response = [
        'type' => 'success',
        'personal' => $personal
      ];
      return $response;
    }
    public function createStepProfession($professionData){
      $profession = Profession::create($professionData);
      $response = [
        'type' => 'success',
        'profession' => $profession
      ];
      return $response;
    }
    public function createStepEducation($educationData){
      $education = Education::create($educationData);
      $response = [
          'type' => 'success',
          'education' => $education
      ];
      return $response;
    }
    public function createStepReligion($religionData){
      $religion = Religion::create($religionData);
      $response = [
          'type' => 'success',
          'religion' => $religion
      ];
      return $response;
    }
    public function createStepAppearance($appearanceData){
      $appearance = Appearance::create($appearanceData);
      $response = [
          'type' => 'success',
          'appearance' => $appearance
      ];
      return $response;
    }
    public function createStepLocation($locationData){
      $location = Location::create($locationData);
      $response = [
          'type' => 'success',
          'location' => $location
      ];
      return $response;
    }
    public function createStepFamily($familyData){
      $family = Family::create($familyData);
      $response = [
          'type' => 'success',
          'family' => $family
      ];
      return $response;
    }
    public function createStepOthers($othersData){
      $others = Others::create($othersData);
      $response = [
          'type' => 'success',
          'others' => $others
      ];
      return $response;
    }
}

