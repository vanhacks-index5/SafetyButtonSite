<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function index()
	{
		$Users = User::all();
		return json_encode($Users);
	}

	public function store(Request $request)
	{
		$ThisUser = new User;

		$ThisUser->Username = $request->Username;
		$ThisUser->Password = $request->Password;

		$ThisUser->save();
	}
}