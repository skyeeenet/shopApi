<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
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

            'id' => $this->id,//this - это объект, который передаем сюда
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            'discount' => $this->discount,
            'totalPrice' => round((1 - ($this->discount / 100)) * $this->price , 2),
            'rating' => $this->comments->count() > 0 ? round($this->comments->sum('star') / $this->comments->count()) : 'No rating yet',
            'href' => [

                'image' => $this->image,
                'reviews' => route('comments.index', $this->id)
            ]
        ];
    }
}
