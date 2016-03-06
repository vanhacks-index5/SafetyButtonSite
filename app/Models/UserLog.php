<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{

	protected $table = "UserLogs";
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'User_ID', 'StartTime', 'EndTime', 'Action'
	];

}