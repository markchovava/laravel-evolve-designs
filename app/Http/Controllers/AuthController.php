<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    
    public function auth_user(){
        $data = Auth::check();

        return response()->json([ 'data' => $data ]);
    }


    
    public function profile(){
        $id = Auth::user()->id;
        $data = User::with(['role'])->find($id);
        Log::info($data);

        return new UserResource($data);
    }

    public function password(Request $request){
        /* $request->validate($request, [
            'password' => 'required|confirmed',
        ]); */

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->password = Hash::make($request->password);
        //$data->password_confirmation = $request->password_confirmation;
        $data->code = $request->password;
        $data->save();

        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new UserResource($data),
        ]);
    }
    
    public function login(LoginRequest $request){
        $request->validated($request->all());

        $user = User::with(['role'])->where('email', $request->email)->first();
        if(!isset($user)){
            return response()->json([
                'message' => 'Email is not found.',
            ]);
        }

        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Password does not match.',
            ]);
        }

        return response()->json([
            'message' => 'Login Successfully.',
            'auth_token' => $user->createToken($user->email)->plainTextToken,
            'role_level' => !empty($user->role->level) ? $user->role->level : 3,
        ]);
   
    }

    public function register(Request $request){

        $data = new User();
        $data->email = $request->email;
        $data->code = $request->password;
        $data->password = Hash::make($request->password);
        $data->save();

        return response()->json([
            'message' => 'Saved Successfully.',
            'auth_token' => $data->createToken($data->email)->plainTextToken,
            'role_level' => 3
        ]);
    }

    public function logout(){
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have succesfully been logged out.',
        ]);
    }

}
