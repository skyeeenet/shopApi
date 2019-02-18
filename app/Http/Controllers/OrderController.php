<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\Order\OrderCreator;
use App\Helpers\Contracts\Order\OrderGiver;
use App\Helpers\Contracts\Order\OrderRemover;
use App\Helpers\Contracts\Order\OrdersTaker;
use App\Http\Requests\AddOrderProductRequest;
use App\Http\Resources\Order\OrderAfterCreateResource;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrdersCollection;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function __construct() {

        $this->middleware('jwt')->except(['store']);
    }

    public function index(OrdersTaker $taker) { //отображает все заказы пользователя

        $orders = $taker::getOrdersByUser(Auth::user());

        return response([

            'data' => OrderResource::collection($orders)
        ], Response::HTTP_OK);
    }

    //Создает новый заказ
    public function store(AddOrderProductRequest $request, OrderCreator $creator) {

        $order = $creator::createOrder($request, Auth::user());

        return response([

            'data' => new OrderAfterCreateResource($order)
        ], Response::HTTP_CREATED);
    }

    public function show(Order $order, OrderGiver $giver) {

        $orderWithInfo = $giver::getOrder(Auth::user(), $order);

        return response([

            'data' => new OrdersCollection($orderWithInfo)
        ], Response::HTTP_OK);

    }

    public function destroy(Order $order, OrderRemover $remover) {

        $remover::removeOrderWithDependencies($order, Auth::user());

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
