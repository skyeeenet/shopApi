<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UserNotAllowed extends Exception {

    public function render() {

        return response([

            'errors' => 'UserNotAllowed'
        ],Response::HTTP_FORBIDDEN);
    }
}
