<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

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
}