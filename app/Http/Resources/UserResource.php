<?php

namespace App\Http\Resources;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'role_id' => $this->role_id,
            'permission_id' => $this->permission_id,
            'name' => $this->name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'profession' => $this->profession,
            'password' => $this->password,
            'code' => $this->code,
            'bio' => $this->bio,
            'address' => $this->address,
            'image' => $this->image,
            'created_at' => $this->created_at->format('d M Y H:i a'),
            'updated_at' => $this->updated_at->format('d M Y H:i a'),
            'role' => new RoleResource($this->whenLoaded('role')),
        ];
    }
}
