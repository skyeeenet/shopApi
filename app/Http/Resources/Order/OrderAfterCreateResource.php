<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\OrderProdResource;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Status;
use Illuminate\Http\Resources\Json\Resource;

class OrderAfterCreateResource extends Resource
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
            'user_id' => $this->user_id,
            'order_id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'patronymic' => $this->patronymic,
            'phone' => $this->phone,
            'address' => $this->address,
            'info' => $this->info,
            'created' => $this->created_at
        ];
    }
}
