<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Auth;


class UserController extends Controller {

    public function create(Request $request){
        $user = new User;
        $formFields = $request->validate([
            'fullName' => 'required | string',
            'gender' => 'required | string',
            'email' => 'required | string | unique:users',
            'password' => 'required',
        ]);
        $user = User::create([
            'fullName' => $formFields['fullName'],
            'gender' => $formFields['gender'],
            'email' => $formFields['email'],
            'password' => bcrypt($formFields['password']),
            'profile_score' => 20
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'type' => 'success',
            'token' => $token,
            'user' => [
            'id' => bcrypt($user->id),
            'profileScore' => $user->profile_score,
            'fullName' => $user->fullName,
          ]
        ];
        return response($response);
    }

    public function login(Request $request){
        $fields = $request->validate([
          'email' => 'required | email',
          'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response([
                'errorType' => 'user',
                'message' => 'User Not Found'
            ], 401);
        } else if(!Hash::check($fields['password'], $user->password)){
            return response([
                'errorType' => 'password',
                'message' => 'Wrong Password'
            ], 401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'type' => 'success',
            'id' => $user->id,
            'membership' => $user->membership,
            'profileScore' => $user->profile_score,
            'state' => $user->state,
            'token' => $token
        ];
        return response($response);
    }

    public function updateProfileScore($id){
        $newProfileScore = '80';
        $profileScoreUpdated = User::where('id', $id)->update(['profile_score' => $newProfileScore]);
        return response($profileScoreUpdated);
    }

    public function updatePassword(Request $request){
        $user = User::where('id', $request->route('id'))->first();
        if($user){
          if(Hash::check($request->oldPassword, $user->password)){
            $user->update(['password' => bcrypt($request->newPassword)]);
            return response([
                'type' => 'success',
                'message' => 'Password has been updated'
            ]);
          } else {
            return response([
                'type' => 'error',
                'message' => 'Old Password is not correct'
            ], 401);
          }
        } else {
            return response([
                'type' => 'error',
                'message' => 'User Not Found'
            ], 401);
        }
    }

    public function updateEmail(Request $request){
      $user = User::where('id', $request->route('id'))->first();
      if($user){
        if($user->email !== $request->email) {
          $updateEmail = $user->update(['email' => $request->email]);
          if($updateEmail){
            return response([
              'type' => 'success',
              'message' => 'Email has been updated'
            ]);
          } else {
            return response([
              'type' => 'error',
              'message' => 'Unable to update email, try later'
            ], 401);
          }
        } else {
          return response([
            'type' => 'error',
            'message' => 'New email is same as Old'
          ], 401);
        }
      } else {
        return response([
          'type' => 'error',
          'message' => 'User Not Found'
        ], 401);
      }
    }

    public function getUserById(Request $request){
      $user = User::where('id', $request->route('id'))->first();
      if($user){
        return response($user);
      } else {
        return response([
          'type' => 'error',
          'message' => 'User not found'
        ]);
      }
    }

    public function logout() {
        Auth::guard('web')->logout();
        return response ([
            'type' => 'success',
            'message' => 'Logged out'
        ], 200);
    }
}
