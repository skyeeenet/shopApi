<?php

namespace App\Http\Resources\Moder\Orders;

use Illuminate\Http\Resources\Json\Resource;

class OrdersModerResource extends Resource
{

    public function toArray($request)
    {

        return [

            'user_id' => $this->user_id,
            'order_id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'patronymic' => $this->patronymic,
            'phone' => $this->phone,
            'address' => $this->address,
            'info' => $this->info,
            'created' => $this->created_at,
            'products' => ProductsOrderResource::collection($this->products)
        ];
    }
}