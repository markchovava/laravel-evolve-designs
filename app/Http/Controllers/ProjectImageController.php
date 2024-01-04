<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectImageResource;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectImageController extends Controller
{

    public $upload_location = 'storage/img/projects';

    public function index(Request $request){
        if(!empty($request->search)){
            $data = ProjectImage::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(20);
        } else {
            $data = ProjectImage::with(['user'])
                    ->orderBy('updated_at','desc')
                    ->orderBy('name','asc')
                    ->paginate(20); 
        
        }
        
        return ProjectImageResource::collection($data);
    }
    public function indexById($id){
        $data = ProjectImage::where('project_id', $id)->get();
        
        return ProjectImageResource::collection($data);
    }

    public function store(Request $request){
        $data = new ProjectImage();
        $data->user_id = $request->user_id;
        $data->image = $request->image;
        $data->project_id = $request->project_id;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ProjectImageResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $data = ProjectImage::find($id);
        $data->user_id = $request->user_id;
        $data->image = $request->image;
        $data->project_id = $request->project_id;
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ProjectImageResource($data),
        ]);
    }

    public function show($id){
        $data = ProjectImage::find($id);
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ProjectImageResource($data),
        ]);
    }

    public function delete($id){
        $data = ProjectImage::find($id); 
        if(file_exists(public_path($data->image))){
            unlink($data->image);
        }
        $data->delete();
        
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }
    
}
