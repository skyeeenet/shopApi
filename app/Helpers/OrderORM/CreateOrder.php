<?php

namespace App\Helpers\OrderORM;

use App\Helpers\Contracts\Order\OrderCreator;
use App\Helpers\ProductBasic;
use App\Http\Requests\AddOrderProductRequest;
use App\Order;
use App\order_product;
use Illuminate\Contracts\Auth\Authenticatable;

class CreateOrder extends ProductBasic implements OrderCreator
{

    public static function createOrder(AddOrderProductRequest $request, Authenticatable $user) {

        $user_id = $user->id;

        $products = $request->data['products'];

        foreach ($products as $product) {

            self::checkProductIfExist($product['product_id']);
        }

        $order = new Order();
        $order->phone = $request->data['phone'];
        $order->info = $request->data['info'];
        $order->first_name = $request->data['first_name'];
        $order->last_name = $request->data['last_name'];
        $order->patronymic = $request->data['patronymic'];
        $order->address = $request->data['address'];
        $order->user_id = $user_id;
        $order->save();

        foreach ($products as $product) {

            $order_product = new order_product([
                'product_id' => $product['product_id'],
                'amount' => $product['amount']
            ]);
            $order->products()->save($order_product);
        }

        return $order;

    }
}