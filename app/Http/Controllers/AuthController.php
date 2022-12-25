<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Users;


class AuthController extends Controller
{
    public function __construct(){
        $this->middleware("auth:api", ["except" => ["llogin", "rregister"]]);
    }
    public function rregister(Request $request){
        $v = Validator::make($request->all(), [
            'name' => 'required|min:2|max:32',
            'email' => 'email|max:64|unique:users',
            'password' => 'required|min:8|max:24',
        ]);
        if($v->fails()){
            return response()->josn([
                'status'=>'error',
                'errors'=>$v->errors()
            ]);
        }
        else{
            return response()->json([
                'status'=>'success',
                'mgs'=>'You are good to go'
            ]);
        }

    }

    public function llogin(Request $request){
        
    }
}
