<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'quantity' => $this->quantity,

            // IMPORTANT: image full URL बनाएंगे
            'image' => url('images/' . $this->image),

            'created_at' => $this->created_at,
        ];
    }
}
