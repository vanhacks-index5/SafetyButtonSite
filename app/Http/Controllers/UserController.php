<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class UserController extends Controller
{
	/**
	 * Enforce authentication
	 */
	public function __construct()
	{
		$this->middleware('jwt.auth', ['except' => ['store']]);
	}

	public function index(Request $request)
	{
		$Users = User::where('remember_token', $request->token)->first();
		return json_encode($Users);
	}

	public function store(Request $request)
	{
		$ThisUser = new User;

		$ThisUser->name = $request->name;
		$ThisUser->email = $request->email;
		$ThisUser->password = Hash::make($request->password);

		// Generate token immediately
		$Token = JWTAuth::fromUser($ThisUser);
		$ThisUser->remember_token = $Token;

		$ThisUser->save();

		return json_encode($ThisUser);
	}

	public function update(Request $request, $id)
	{
		$user = User::find($id);

		$user->emergency = 1;
		$user->lat = $request->input("lat");
		$user->lng = $request->input("lng");
		$user->save();
	}
	public function clear($id){
		$user = User::find($id);

		$user->emergency = 0;
		$user->lat = null;
		$user->lng = null;
		$user->save();
	}
}