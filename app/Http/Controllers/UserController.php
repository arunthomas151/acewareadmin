<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userauth(Request $request){
        $validator = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required",
        ]);
        if($validator->fails()){
            return response()->json(['message' => $validator->errors()->all()[0], 'status' => 202]);
        }

        $userdata = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if (Auth::attempt($userdata)){
            return response()->json(['message' => 'Success', 'userid' => Auth::id(), 'status' => 200]);
        }else{
            return response()->json(['message' => 'Unauthorized Access', 'status' => 202]);
        }
    }

    public function uploadresume(Request $request){
        $validator = Validator::make($request->all(), [
            "resume" => "required|mimes:pdf|max:10000",
        ]);
        if($validator->fails()){
            return response()->json(['message' => $validator->errors()->all()[0], 'status' => 202]);
        }
        $user = User::find($request->userid);
        $image = $request->file('resume');
        $resume = $user->name . rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('Resume'), $resume);
        $resume_link = 'Resume/'.$resume;
        $user->resume_link = $resume_link;
        if($user->save()){
            return response()->json(['message' => 'Resume Uploaded Successfully', 'status' => 200]);
        }
    }
}
