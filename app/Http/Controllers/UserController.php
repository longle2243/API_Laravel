<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginUser(Request $request)
    {
        //
        $input = $request->all();

        Auth::attempt($input);

        $user = Auth::user();

        $token = $user->createToken('Token Name')->accessToken;
        return Response(['status' => 200, 'token' => $token], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getUserDetail(Request $request)
    {
        //
        if(Auth::guard('api')->check()){
            $user = Auth::guard('api')->user();
            return response()->json([
                "status" => "201",
                "message" => "Success",
                "data" => $user
            ]);
        }

        return response()->json([
            "status" => "401",
            "message" => "Unauthorized",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function userLogout()
    {
        //
    }

}
