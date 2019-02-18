<?php

namespace App\Helpers\Date;

class DateNormalizer implements Date
{

    public static function getNormalizedDate(&$begin, &$end = false)
    {
        if ($end != false) {

            $begin = $begin.' 00:00:00';
            $end = $end.' 23:59:59';
        }
        else {

            $begin = $begin.' 00:00:00';
        }
    }
}