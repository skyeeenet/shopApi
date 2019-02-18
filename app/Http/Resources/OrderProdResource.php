<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OrderProdResource extends Resource
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
            'order_id' => $this->product_id,
            'test' => $this->product
        ];
    }
}
