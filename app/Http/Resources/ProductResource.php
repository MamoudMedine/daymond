<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'cover_url' => $this->cover_url,
            'images' => $this->images,
            'condition' => $this->condition,
            'description' => $this->description,
            'wholesale_price' => $this->wholesale_price,
            'old_wholesale_price' => $this->old_wholesale_price,
            'commission' => $this->commission,
            'min_suggestion_price' => $this->min_suggestion_price,
            'max_suggestion_price' => $this->max_suggestion_price,
            'delivery_price' => $this->delivery_price,
            'abj_delivery_price' => $this->abj_delivery_price,
            'location' => $this->location,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
