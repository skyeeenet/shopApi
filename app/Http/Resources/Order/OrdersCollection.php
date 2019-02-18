<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Order\ProductsOrderResource;
use Illuminate\Http\Resources\Json\Resource;

class OrdersCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $sum = 0;

        foreach ($this->products as $products) {

            $discount = $products->product['discount'];
            $price = $products->product['price'];
            $sum += round((1 - ($discount / 100)) * $price , 2);
        }

        return [

            'user_id' => $this->user_id,
            'order_id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'patronymic' => $this->patronymic,
            'phone' => $this->phone,
            'address' => $this->address,
            'info' => $this->info,
            'totalSum' => $sum,
            'created' => $this->created_at,
            'products' => ProductsOrderResource::collection($this->products)
        ];
    }
}
