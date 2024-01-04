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
    public function profile(){
        $id = Auth::user()->id;
        $data = User::find($id);
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
    
    public function login(Request $request){
        //$request->validated($request->all());

        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'message' => 'User does not exist in the database.',
                'error' => 401
            ]);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'message' => 'Login Successfully.',
            'token' => $user->createToken($user->email)->plainTextToken,
        ]);
    }

    public function register(Request $request){
        //$request->validated($request->all());

        $data = new User();
        $data->email = $request->email;
        $data->code = $request->password;
        $data->password = Hash::make($request->password);
        $data->save();

        return response()->json([
            'message' => 'Saved Successfully.',
            'token' => $data->createToken($data->email)->plainTextToken,
        ]);
    }

    public function logout(){
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have succesfully been logged out and your token has been removed.',
        ]);
    }

}
