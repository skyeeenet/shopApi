<?php

namespace App\Http\Controllers;

use App\Exceptions\UserNotAllowed;
use App\Http\Resources\Order\OrderResource;
use App\Order;
use App\order_product;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        $orders = \App\Order::where('user_id', $user_id)->get();

        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Order $order ,Request $request) //добавить новый продукт к заказу
    {
        //TODO Реализовать посредника для безопасности
        $product_order = new order_product();
        $product_order['product_id'] = $request->product_id;
        $product_order['amount'] = $request->amount;
        $order->products()->save($product_order);
        return response([
            'data' => $order
        ], \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order_product  $order_product
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return Product::with('product');
        return OrderResource::collection($order::with('products.product')->where('id', $order->id)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order_product  $order_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order) //обновляет кол-во товара
    {

        order_product::where([
            'order_id' => $order->id,
            'product_id' => $request->product_id
        ])->update(['amount' => $request->amount]);

        return response(null,\Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order_product  $order_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Order $order)
    {
        $product_id = $request->product_id;

        order_product::where([
            'product_id' => $request->product_id,
            'order_id' => $order->id
        ])->delete();

        return response(null, \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);

    }
}
