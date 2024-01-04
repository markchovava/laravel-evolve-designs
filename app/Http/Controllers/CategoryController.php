<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{ 

    public function index(Request $request){
        if(!empty($request->search)){
            $data = Category::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(15);
        } else {
            $data = Category::with(['user'])
                    ->orderBy('updated_at','desc')
                    ->orderBy('name','asc')
                    ->paginate(15); 
        
        }
        
        return CategoryResource::collection($data);
    }

    public function store(Request $request){
        $data = new Category();
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new CategoryResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $data = Category::find($id);
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new CategoryResource($data),
        ]);
    }

    public function show($id){
        $data = Category::with(['user'])->find($id);
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new CategoryResource($data),
        ]);
    }

    public function delete($id){
        $data = Category::find($id);
        $data->delete();
        
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }

    
}
