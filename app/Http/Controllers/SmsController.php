<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class SmsController extends Controller
{
	public function index()
	{
		$ThisMessage = array();
		$ThisMessage['Message_UUID'] = $_POST['MessageUUID'];
		$ThisMessage['Message_To'] = $_POST['To'];
		$ThisMessage['Message_From'] = $_POST['From'];
		$ThisMessage['Message_Text'] = $_POST['Text'];
		$ThisMessage['Message_DateCreate'] = "2000-01-01";

		error_log($ThisMessage['Message_Text'], 3, "/var/log/www/www.safetybutton.local/logs/test.log");
		return "1";
	}
}