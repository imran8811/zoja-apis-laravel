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
            'email' => 'required | string | unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'fullName' => $formFields['fullName'],
            'email' => $formFields['email'],
            'password' => bcrypt($formFields['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'type' => 'success',
            'token' => $token,
            'user' => $user
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
            'fullName' => $user->fullName,
            'membership' => $user->membership,
            'profileScore' => $user->profile_score,
            'state' => $user->state,
            'token' => $token
        ];
        return response($response);
    }

    public function updateProfileScore($id){
        $newProfileScore = '90';
        $profileScoreUpdated = User::where('id', $id)->update(['profile_score' => $newProfileScore]);
        return response($profileScoreUpdated);
    }

    public function deleteUserById($id){
        $userDeleted = User::where('id', $id)->delete();
        if($userDeleted === 1) {
            $profileDeleted = Profile::where('userId', $id)->delete();
            if($profileDeleted === 1){
                $response = [
                    'type' => 'Success',
                    'message' => 'User deleted successfuly'
                ];
                return response($userDeleted);
            } else {
                $response = [
                    'type' => 'Error',
                    'message' => 'Unable to delete profile, try later'
                ];
                return response($response);
            }
        } else {
            $response = [
                'type' => 'Error',
                'message' => 'Unable to delete user, try later'
            ];
            return response($response);
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
