<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MeetingCollection extends ResourceCollection
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
                    'name' => $user->name,
                    'body' => $user->body,
                    'email' => $user->email,
                    'created_at' => $user->created_at->format('M d,Y'),
                    
                ];
            }),
        ];
    
    }
}
