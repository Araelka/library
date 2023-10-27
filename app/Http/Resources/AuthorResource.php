<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'name' => $this->name,
            'books_count' => $this->when($this->books_count != null, $this->books_count),
            'books' => BookResource::collection($this->when($this->books_count == null, $this->books)),
            'created_at' => $this->created_at,
        ];
    }
}
