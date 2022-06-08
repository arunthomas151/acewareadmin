<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.home');
    }

    public function userreg(){
        return view('Admin.userreg');
    }
    public function userslist(){
        $users = User::get();
        return view('Admin.userlist')->with(['users' => $users]);
    }

    public function registarion(Request $request,User $reg){
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required",
        ]);
        if($validator->fails()){
            $errors = $validator->errors()->all()[0];
            return view('Admin.userreg')->with(['errors' => $errors]);
        }
        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->password = Hash::make($request->password);
        if($reg->save()){
            return redirect('userreg');
        }
    }
}
