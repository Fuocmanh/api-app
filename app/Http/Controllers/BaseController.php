<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    protected function sendResponse($result, $message = 'Success', $code = 200)
    {
        $response = [
            "success" => true,
            "data" => $result,
            "message"=> $message
        ];

        return response()->json($response, $code);
    }

    protected function sendError($error, $message = 'Error', $code = 400)
    {
        $response = [
            "success" => false,
            "error" => $error,
            "message"=> $message
        ];

        return response()->json($response, $code);
    }
}
