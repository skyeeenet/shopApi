<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product_id' => $this->id,
            'product_name' => $this->name,
            'category' => $this->category,
            'price' => $this->price,
            'discount' => $this->discount,
            'total_price' => round((1 - ($this->discount / 100)) * $this->price , 2),
            'rating' => $this->comments->count() > 0 ? round($this->comments->sum('star') / $this->comments->count()) : 'No rating yet',
            'href' => [

                'link' => route('products.show', $this->id)
            ]
        ];
    }
}
