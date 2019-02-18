<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 18.12.2018
 * Time: 22:53
 */

namespace App\Helpers\Facades;


use Illuminate\Support\Facades\Facade;

class Date extends Facade
{
    public static function getFacadeAccessor() {

        return 'date';
    }
}