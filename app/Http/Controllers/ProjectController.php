<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public $thumbnail_upload_location = 'storage/img/projects/thumbnail/';
    public $upload_location = 'storage/img/projects/';
    
    public function index(Request $request){
        if(!empty($request->search)){
            $data = Project::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(15);
        } else {
            $data = Project::with(['user'])
                    ->orderBy('updated_at','desc')
                    ->orderBy('name','asc')
                    ->paginate(15); 
        
        }
        
        return ProjectResource::collection($data);
    }

    public function store(Request $request){
        $data = new Project();
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

     
        $project_images = $request->file('project_images');
        //Log::info($project_images);
        for($i = 0; $i < count($project_images); $i++){
            $_data = new ProjectImage();
            $_data->created_at = now();
            $_data->updated_at = now();
            $_data->user_id = Auth::user()->id;
            $_data->project_id = $data->id;
            
            /* WRITE TO LOG FILE */
            //Log::info($project_images[$i]);

            if( !empty($project_images[$i]) ){
                $image = $project_images[$i];
                $image_extension = strtolower($image->getClientOriginalExtension());
                $image_name = date('YmdHi') . rand(0,1000) . '.' . $image_extension;
                $image->move($this->upload_location, $image_name);
                $_data->image = $this->upload_location . $image_name;
            } 
            $_data->save();
        }
      
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ProjectResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $data = Project::find($id);
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

        //$project_images = $request->project_images;
        //$output = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$output->writeln("<info>Name: " . $request . "</info>");
        //dd($request->project_images);
        if(!empty($request->file('project_images'))){
            $project_images = $request->file('project_images');
            Log::info($project_images);
            for($i = 0; $i < count($project_images); $i++){
                $_data = new ProjectImage();
                $_data->created_at = now();
                $_data->updated_at = now();
                $_data->user_id = Auth::user()->id;
                $_data->project_id = $data->id;
                if( !empty($project_images[$i]) ){
                    $image = $project_images[$i];
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
            'data' => new ProjectResource($data),
        ]);
    }

    public function show($id){
        $data = Project::with(['user', 'categories', 'project_images'])->find($id);
        
        return  new ProjectResource($data);
    }

    public function delete($id){
        $data = Project::find($id);
        if(!empty($data->thumbnail)){
            if(file_exists(public_path($data->thumbnail))){
                unlink($data->thumbnail);
            }

        }
        $data->delete();

        $_data = ProjectImage::where('project_id', $id)->get();
        foreach($_data as $item){
            if(file_exists(public_path($item->image))){
                unlink($item->image);
            }
        }
        ProjectImage::where('project_id', $id)->delete();
        
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }

}
