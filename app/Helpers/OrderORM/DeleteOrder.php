<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 09.12.2018
 * Time: 16:10
 */

namespace App\Helpers\OrderORM;


use App\Helpers\Contracts\Order\OrderRemover;
use App\Helpers\Facades\RoleChecker;
use App\Order;
use App\User;

class DeleteOrder implements OrderRemover
{

    public static function removeOrderWithDependencies(Order $order, User $user) {

        if ($order->user_id == $user->id || self::checkRole($user)) {

            $order->products()->delete();
            $order->delete();
        }
    }

    public static function checkRole(User $user) {

        if ($user->role_id > 1) return true;
        else return false;
    }
}