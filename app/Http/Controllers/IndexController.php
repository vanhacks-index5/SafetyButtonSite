<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
use App\Models\UserLog;

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
		$Users = DB::select(
			"SELECT * " .
			"FROM users " .
			"   LEFT JOIN UserInfos " .
			"       ON users.id = UserInfos.Info_ID " .
			"ORDER BY UserInfos.Info_ID DESC "
		);
		return view('profile', ['Users' => $Users]);
	}

	public function log()
	{
		$History = UserLog::all();
		return view('log', ['History' => $History]);
	}

	public function show($id, $lat = null, $lng = null){
		$user = DB::select('select * from users LEFT JOIN UserInfos ON users.id = UserInfos.User_ID WHERE users.id = ? ORDER BY Info_ID DESC LIMIT 1' , [$id]);
		return view('userprofile', ['user' => $user[0], 'lat' => $lat, 'lng' => $lng]);
	}
}