<?php

namespace App\Helpers\Moder\Orders\SortMakers;

use App\Helpers\Moder\Orders\SortMakers\DateBeginMaker;
use App\Helpers\Moder\Orders\SortMakers\DateSortMaker;
use App\Helpers\Moder\Orders\SortMakers\DateStatusMaker;
use App\Helpers\Moder\Orders\SortMakers\DateStatusPhoneMaker;
use App\Helpers\Moder\Orders\SortMakers\PhoneSortMaker;
use App\Helpers\Moder\Orders\SortMakers\StatusSortMaker;
use Illuminate\Http\Request;
use Mockery\Exception;

class ChooseMaker
{
    public static function getMakerByRequest(Request $request) {

        if ($request->begin && $request->end && $request->status && $request->phone) {

            return new DateStatusPhoneMaker();
        }

        if ($request->begin && $request->end && $request->status) {

            return new DateStatusMaker();
        }

        if ($request->begin && $request->end) {

            return new DateSortMaker();
        }

        if ($request->begin) {

            return new DateBeginMaker();
        }

        if ($request->status) {

            return new StatusSortMaker();
        }

        if ($request->phone) {

            return new PhoneSortMaker();
        }

        throw new Exception("Maker not found");
    }
}