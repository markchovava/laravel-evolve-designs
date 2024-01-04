<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceTypeResource;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ServiceTypeController extends Controller
{
    public function indexById($id){
        $data = ServiceType::with(['type'])
                    ->where('service_id', $id)
                    ->orderBy('updated_at','desc')
                    ->get(); 
        
        return ServiceTypeResource::collection($data);
    }

    public function store(Request $request){
        if($request->service_types) {
            $service_types = $request->service_types;
            Log::info($service_types);
            foreach ($service_types as $item) {
                $data = new ServiceType();
                $data->user_id = Auth::user()->id;
                $data->service_id = $item['service_id'];
                $data->type_id = $item['type_id'];
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
        $data = ServiceType::with(['user','service', 'type'])->find($id);
        
        return response()->json([
            'message' => 'Saved Successfully.',
            'data' => new ServiceTypeResource($data),
        ]);
    }

    public function delete($id){
        $data = ServiceType::find($id);
        $data->delete();
        
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }
}
