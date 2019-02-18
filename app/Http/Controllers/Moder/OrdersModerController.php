<?php

namespace App\Http\Controllers\Moder;

use App\Helpers\Contracts\Moder\OrdersSort;
use App\Helpers\Contracts\User\UserUpdater;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrdersCollection;
use App\Http\Resources\User\UserResource;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrdersModerController extends Controller
{
    public function __construct() {

        $this->middleware('jwt');
        $this->middleware('moderOnly');
    }

    public function index(Request $request) {
    //show all orders
        return Order::orderBy('status_id')->paginate(20);
    }

    public function show(Order $order) {

        return new OrdersCollection(Order::with('products.product')->where('id', $order->id)->first());
    }

    public function sort(Request $request, OrdersSort $sort) {

        //TODO валидация входящих параметров
        return $sort::getSortOrders($request);

    }

    public function update(Request $request, User $user, UserUpdater $updater) {

        $result = $updater::updateUser($request, $user);

        return response([
            'data' => $result
        ], \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    public function destroy(Order $order) {

        $order->delete();

        return response(null, \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
    }
}
