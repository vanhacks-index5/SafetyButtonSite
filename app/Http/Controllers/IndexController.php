<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
	/**
	 * Show the front page
	 */
	public function index()
	{
		$EmergencyUsers = User::where('emergency', 1)->get();
		return view('index', ['EmergencyUsers' => $EmergencyUsers]);
	}

	public function profile()
	{
		$Users = User::all();
		return view('profile', ['Users' => $Users]);
	}

	public function show($id){
		$user = DB::select('select * from users JOIN UserInfos ON users.id = UserInfos.User_ID WHERE id = ? ORDER BY Info_ID DESC LIMIT 1' , [$id]);
//		return response()->json($user);
		return view('userprofile', ['user' => $user[0]]);
	}
}