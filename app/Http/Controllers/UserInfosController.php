<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class UserInfosController extends Controller
{
    public function index(){
        $q = DB::select('SELECT * FROM UserInfos');
        return response()->json($q);
    }

    public function store(Request $request)
    {
//        $Info_ID = $request->input('Info_ID');
        $User_ID = $request->input('User_ID');
        $Name = $request->input('Name');
        $Home_Address = $request->input('Home_Address');
        $Work_Address = $request->input('Work_Address');
        $Partner_Home_Address = $request->input('Partner_Home_Address');
        $Partner_Work_Address = $request->input('Partner_Work_Address');
        $Partner_Name = $request->input('Partner_Name');
        $Partner_License_Plate = $request->input('Partner_License_Plate');

        $Children_Names = $request->input('ChildrenNames');

        $Legal_Orders = $request->input('Legal_Orders');

        $License_Plate = $request->input('License_Plate');

        $Other = $request->input('Other');

//        return $Other;

        DB::insert('insert into UserInfos (User_ID, Name, Home_Address, Work_Address, Partner_Home_Address, Partner_Work_Address, Partner_Name, Partner_License_Plate, ChildrenNames, Legal_Orders, License_Plate, Other) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [
                1,
                $Name,
                $Home_Address,
                $Work_Address,
                $Partner_Home_Address,
                $Partner_Work_Address,
                $Partner_Name,
                $Partner_License_Plate,
                $Children_Names,
                $Legal_Orders,
                $License_Plate,
                $Other
            ]);



    }
}
