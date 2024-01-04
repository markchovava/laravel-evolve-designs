<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceImageResource;
use App\Models\ServiceImage;
use Illuminate\Http\Request;

class ServiceImageController extends Controller
{

    public $upload_location = 'storage/img/services';
    
    public function index(Request $request){
        if(!empty($request->search)){
            $data = ServiceImage::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(20);
        } else {
            $data = ServiceImage::with(['user'])
                    ->orderBy('updated_at','desc')
                    ->orderBy('name','asc')
                    ->paginate(20); 
        
        }
        
        return ServiceImageResource::collection($data);
    }

    public function indexById($id){
        $data = ServiceImage::where('service_id', $id)->get();
        
        return ServiceImageResource::collection($data);
    }

    public function store(Request $request){
        $data = new ServiceImage();
        $data->user_id = $request->user_id;
        $data->image = $request->image;
        $data->Service_id = $request->Service_id;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ServiceImageResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $data = ServiceImage::find($id);
        $data->user_id = $request->user_id;
        $data->image = $request->image;
        $data->Service_id = $request->Service_id;
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ServiceImageResource($data),
        ]);
    }

    public function show($id){
        $data = ServiceImage::find($id);
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ServiceImageResource($data),
        ]);
    }

    public function delete($id){
        $data = ServiceImage::find($id); 
        if(file_exists(public_path($data->image))){
            unlink($data->image);
        }
        $data->delete();
        
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }

}
