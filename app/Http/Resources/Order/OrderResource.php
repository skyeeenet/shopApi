<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\OrderProdResource;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Status;
use Illuminate\Http\Resources\Json\Resource;

class OrderResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $status = Status::where('id', $this->status_id)->first(['name'])->name;

        return [

            'order_id' => $this->id,
            'status' => $status,
            'created' => $this->created_at
        ];
    }
}
