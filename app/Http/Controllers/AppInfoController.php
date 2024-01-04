<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppInfoResource;
use App\Models\AppInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AppInfoController extends Controller
{
    public $upload_location = 'storage/img/';

    public function index(){
        $data = AppInfo::with(['user'])->first();

        return response()->json([
            'message' => 'Our App Info',
            'data' => !empty($data) ? new AppInfoResource($data) : false,
        ]);
    }


    public function store(Request $request){
        $data = new AppInfo();
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = date('YmdHi') . '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;             
        }
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->website = $request->website;
        $data->twitter = $request->twitter;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->whatsapp = $request->whatsapp;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();

        return response()->json([
            'message' => 'Our App Info',
            'data' => new AppInfoResource($data)
        ]);
    }


    public function update(Request $request, $id){
        //$output = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$output->writeln("<info>Name: " . $request->name . "</info>");
        $data = AppInfo::find($id);
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = date('YmdHi'). '.' . $image_extension;
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
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->description = $request->description;
        $data->address = $request->address;
        $data->website = $request->website;
        $data->twitter = $request->twitter;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->whatsapp = $request->whatsapp;
        $data->updated_at = now();
        $data->save();

        return response()->json([
            'message' => 'Our App Info',
            'data' => new AppInfoResource($data)
        ]);
    }

}
