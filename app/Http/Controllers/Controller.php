<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function checkUserSession()
    {
        return auth()->user();
    }

    public function errorRes($message, $code = 400)
    {  
        return json_encode([
            'success' => false,
            'message' => $message,
            'code' => 400
        ]);
    }

    public function successRes($message, $data = [], $code = 400)
    {  
        return json_encode([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'code' => $code
        ]);
    }
}
