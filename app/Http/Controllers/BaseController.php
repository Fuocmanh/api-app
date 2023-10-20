<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    protected function sendResponse($result, $message = 'Success', $code = 200)
    {
        $response = [
            "success" => true,
            "data" => $result,
            "message" => $message
        ];

        return response()->json($response, $code);
    }

    protected function sendError($error, $message = 'Error', $code = 400)
    {
        $response = [
            "success" => false,
            "error" => $error,
            "message" => $message
        ];

        return response()->json($response, $code);
    }

    protected function sendResponseMessage($data, $msgSuccess = ['message' => 'Success'],$code=200): JsonResponse
    {
        if ($data) {
            $response = $this->sendResponse($data, $msgSuccess,$code);
        } else {
            $response = $this->sendError(['message' => 'Có lỗi xảy ra']);
        }
        return $response;
    }
}
