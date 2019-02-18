<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\Resource;

class ProductsOrderResource extends Resource
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
            'product_id' => $this->product_id,
            'amount' => $this->amount,
            'product' => new ProductOrderResource($this->product)
        ];
    }
}
