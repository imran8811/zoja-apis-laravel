<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class SearchController extends Controller {

	public function searchProfile(Request $request){
		$users = User::join('profiles', 'profiles.userId', '=', 'users.id')
					->where('profileType', $request->type)
					->get();
		// $getUser = User::where('type', $request->type)->get();
		// $getProfiles = Profile::where('')
		return response($users);
	}
}
