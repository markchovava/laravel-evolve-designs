<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public $upload_location = 'storage/img/user/';
    
    public function index(Request $request){
        if(!empty($request->search)){
            $data = User::where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(15);
        } else {
            $data = User::orderBy('name','asc')
                    ->orderBy('updated_at','desc')
                    ->paginate(15); 
        
        }

        return UserResource::collection($data);
       
    }


    public function store(Request $request){
        $code = rand(10000000, 10000000000);
        $data = new User();
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = date('YmdHi') . '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;             
        }
        $data->permission_id = (int)$request->permission_id;
        $data->role_id = (int)$request->role_id;
        $data->name = $request->name;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->address = $request->address;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->profession = $request->profession;
        $data->bio = $request->bio;
        $data->password = Hash::make($code);
        $data->code = $code;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();

        return response()->json([
            'message' => 'User Info',
            'data' => new UserResource($data)
        ]);
    }


    public function update(Request $request, $id){
        $data = User::find($id);
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = date('YmdHi') . '.' . $image_extension;
            if(!empty($data->image)){
                if(file_exists(public_path($data->image))){
                    unlink($data->image);
                }
                $image->move($this->upload_location, $image_name);
                $data->image = $this->upload_location . $image_name;                    
            }else{
                $image->move($this->upload_location, $image_name);
                $data->image = $this->upload_location . $image_name;
            }              
        }
        $data->permission_id = (int)$request->permission_id;
        $data->role_id = (int)$request->role_id;
        $data->name = $request->name;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->address = $request->address;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->profession = $request->profession;
        $data->bio = $request->bio;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();

        return response()->json([
            'message' => 'Our App Info',
            'data' => new UserResource($data)
        ]);
    }

    public function show($id){
        $data = User::find($id);

        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new UserResource($data),
        ]);
    }


    public function delete($id){
        $data = User::find($id);
        $data->delete();

        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new UserResource($data),
        ]);
    }


}
