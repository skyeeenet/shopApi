<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 18.12.2018
 * Time: 23:02
 */

namespace App\Helpers\Date;


interface Date
{
    public static function getNormalizedDate(&$begin, &$end = false);
}