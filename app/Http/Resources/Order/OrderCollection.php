<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Product\ProductCollection;
use Illuminate\Http\Resources\Json\Resource;

class OrderCollection extends Resource
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
            'phone' => $this->phone,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'patronymic' => $this->patronymic,
            'order_id' => $this->order_id,
            'amount' => $this->amount,
            'product' => new ProductCollection($this->product)
        ];
    }
}
