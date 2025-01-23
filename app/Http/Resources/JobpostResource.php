<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobpostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'body' => $this->body,
            'company' => $this->company,
            'images' => asset('resourceimages/' . $this->images),  // Include the image URL
            'created_at' => $this->created_at->format('M d,Y'),
        ];
    }
}
