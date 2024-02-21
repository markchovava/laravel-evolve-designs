<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectCategoryResource;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProjectCategoryController extends Controller
{
   
    public function indexById($id){
        $data = ProjectCategory::with(['project', 'category'])
                    ->where('category_id', $id)
                    ->orderBy('updated_at','desc')
                    ->paginate(12); 
        
        return ProjectCategoryResource::collection($data);
    }

    public function store(Request $request){
        if($request->project_categories) {
            $project_categories = $request->project_categories;
            Log::info($project_categories);
            foreach ($project_categories as $item) {
                $data = new ProjectCategory();
                $data->user_id = Auth::user()->id;
                $data->project_id = $item['project_id'];
                $data->category_id = $item['category_id'];
                $data->created_at = now();
                $data->updated_at = now();
                $data->save();
            } 
        }

        return response()->json([
            'message' => 'Saved Successfully.',
        ]);
    }
 
    public function show($id){
        $data = ProjectCategory::with(['user','project', 'category'])->find($id);
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ProjectCategoryResource($data),
        ]);
    }

    public function delete($id){
        $data = ProjectCategory::find($id);
        $data->delete();
        
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }
    
}
