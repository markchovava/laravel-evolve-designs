<?php

namespace App\Http\Controllers;

use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{

    public function index(Request $request){
        if(!empty($request->search)){
            $data = Permission::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(15);
        } else {
            $data = Permission::with(['user'])
                    ->orderBy('updated_at','desc')
                    ->orderBy('name','asc')
                    ->paginate(15); 
        
        }
        
        return PermissionResource::collection($data);
    }

    public function store(Request $request){
        $data = new Permission();
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->level = (int)$request->level;
        $data->description = $request->description;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new PermissionResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $data = Permission::find($id);
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->level = (int)$request->level;
        $data->description = $request->description;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new PermissionResource($data),
        ]);
    }

    public function show($id){
        $data = Permission::with(['user'])->find($id);
        
        return response()->json([
            'message' => 'Permission Data',
            'data' => new PermissionResource($data),
        ]);
    }

    public function delete($id){
        $data = Permission::find($id);
        $data->delete();
        
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }
    
}
