<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppInfoResource extends JsonResource
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
            'user_id' => $this->user_id,
            'image' => $this->image,
            'name' => $this->name,
            'description' => $this->description,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'email' => $this->email,
            'website' => $this->website,
            'facebook' => $this->facebook,
            'whatsapp' => $this->whatsapp,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'created_at' => $this->created_at->format('d M Y H:i a'),
            'updated_at' => $this->updated_at->format('d M Y H:i a'),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
