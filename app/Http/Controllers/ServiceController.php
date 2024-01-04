<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{

    public $thumbnail_upload_location = 'storage/img/services/thumbnail/';
    public $upload_location = 'storage/img/services/';

    public function index(Request $request){
        if(!empty($request->search)){
            $data = Service::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(15);
        } else {
            $data = Service::with(['user'])
                    ->orderBy('updated_at','desc')
                    ->orderBy('name','asc')
                    ->paginate(15); 
        
        }
        
        return ServiceResource::collection($data);
    }

    public function store(Request $request){
        $data = new Service();
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        if( $request->hasFile('thumbnail') ){
            $thumbnail = $request->file('thumbnail');
            $thumbnail_extension = strtolower($thumbnail->getClientOriginalExtension());
            $thumbnail_name = date('YmdHi'). '.' . $thumbnail_extension;
            $thumbnail->move($this->thumbnail_upload_location, $thumbnail_name);
            $data->thumbnail = $this->thumbnail_upload_location . $thumbnail_name;
        }
        $data->description = $request->description;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();

    
        if(!empty($request->file('service_images'))){
            $service_images = $request->file('service_images');
            Log::info($service_images);
            for($i = 0; $i < count($service_images); $i++){
                $_data = new ServiceImage();
                $_data->created_at = now();
                $_data->updated_at = now();
                $_data->user_id = Auth::user()->id;
                $_data->service_id = $data->id;
                
                /* WRITE TO LOG FILE */
                Log::info($service_images[$i]);
    
                if( !empty($service_images[$i]) ){
                    $image = $service_images[$i];
                    $image_extension = strtolower($image->getClientOriginalExtension());
                    $image_name = date('YmdHi') . rand(0,1000) . '.' . $image_extension;
                    $image->move($this->upload_location, $image_name);
                    $_data->image = $this->upload_location . $image_name;
                } 
                $_data->save();
            }
        }
      
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ServiceResource($data),
        ]);
    }



    public function update(Request $request, $id){
        $data = Service::find($id);
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;

        if( $request->hasFile('thumbnail') ){
            $thumbnail = $request->file('thumbnail');
            $image_extension = strtolower($thumbnail->getClientOriginalExtension());
            $image_name = date('YmdHi'). '.' . $image_extension;
            if(!empty($data->thumbnail)){
                if(file_exists(public_path($data->thumbnail))){
                    unlink($data->thumbnail);
                }
                $thumbnail->move($this->upload_location, $image_name);
                $data->thumbnail = $this->upload_location . $image_name;                    
            }else{
                $thumbnail->move($this->upload_location, $image_name);
                $data->thumbnail = $this->upload_location . $image_name;
            }              
        }

        $data->description = $request->description;
        $data->updated_at = now();
        $data->save();

        //$service_images = $request->service_images;
        //$output = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$output->writeln("<info>Name: " . $request . "</info>");
        //dd($request->service_images);
        if(!empty($request->file('service_images'))){
            $service_images = $request->file('service_images');
            Log::info($service_images);
            for($i = 0; $i < count($service_images); $i++){
                $_data = new ServiceImage();
                $_data->created_at = now();
                $_data->updated_at = now();
                $_data->user_id = Auth::user()->id;
                $_data->service_id = $data->id;
                if( !empty($service_images[$i]) ){
                    $image = $service_images[$i];
                    $image_extension = strtolower($image->getClientOriginalExtension());
                    $image_name = date('YmdHi') . rand(0,1000) . '.' . $image_extension;
                    $image->move($this->upload_location, $image_name);
                    $_data->image = $this->upload_location . $image_name;
                } 
                $_data->save();
            }
        }
      
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ServiceResource($data),
        ]);
    }

    public function show($id){
        $data = Service::with(['user', 'service_images'])->find($id);
        
        return  new ServiceResource($data);
    }

    public function delete($id){
        $data = Service::find($id);
        if(!empty($data->thumbnail)){
            if(file_exists(public_path($data->thumbnail))){
                unlink($data->thumbnail);
            }

        }
        $data->delete();

        $_data = ServiceImage::where('service_id', $id)->get();
        foreach($_data as $item){
            if(file_exists(public_path($item->image))){
                unlink($item->image);
            }
        }
        ServiceImage::where('service_id', $id)->delete();
        
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }
}
