<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class JobpostResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($user) {
                return [
                    'slug' => $user->slug,
                    'title' => $user->title,
                    'body' => $user->body,
                    'company' => $user->company,
                    'images' => asset($user->images),  // Include the image URL
                    'created_at' => $user->created_at->format('M d,Y'),
                    
                ];
            }),
        ];
    }
}
