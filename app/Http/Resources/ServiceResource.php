<?php

namespace App\Http\Resources;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'thumbnail' => $this->thumbnail,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d M Y H:i a'),
            'updated_at' => $this->updated_at->format('d M Y H:i a'),
            'user' => new UserResource($this->whenLoaded('user')),
            'types' => TypeResource::collection($this->whenLoaded('types')),
            'service_images' => ServiceImageResource::collection($this->whenLoaded('service_images')),
        ];
    }
}
