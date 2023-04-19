<?php

namespace App\Traits;

trait ApiResponser
{

    protected function successResponse($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'Success',
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse($message = null, $code = 400)
    {
        return response()->json([
            'status' => 'Error',
            'code' => $code,
            'message' => $message,
            'data' => null
        ], $code);
    }
}
