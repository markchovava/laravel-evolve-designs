<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    
    public function index(Request $request){
        if(!empty($request->search)){
            $data = Type::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->paginate(15);
        } else {
            $data = Type::with(['user'])
                    ->orderBy('updated_at','desc')
                    ->orderBy('name','asc')
                    ->paginate(15); 
        
        }
        
        return TypeResource::collection($data);
    }

    public function store(Request $request){
        $data = new Type();
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new TypeResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $data = Type::find($id);
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new TypeResource($data),
        ]);
    }

    public function show($id){
        $data = Type::with(['user'])->find($id);
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new TypeResource($data),
        ]);
    }

    public function delete($id){
        $data = Type::find($id);
        $data->delete();
        
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }

}
