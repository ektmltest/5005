<?php

namespace App\Helpers;

Class Response
{

    /**
     * ok - return json response with status code 200
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function ok(array $data) {
        $data['status'] = 200;
        return response()->json($data, 200);
    }

    /**
     * notAuthorized - return not authrized response 401
     *
     * @param mixed $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function notAuthorized($msg) {
        return response()->json([
            'message' => $msg,
            'status' => 401
        ], 401);
    }

    /**
     * badRequest - returns badrequest response 400
     *
     * @param mixed $msg
     * @param mixed $err
     * @param mixed $old
     * @return \Illuminate\Http\JsonResponse
     */
    public function badRequest($msg, $err = NULL, $old = NULL) {
        $response = [
            'message' => $msg,
            'status' => 400
        ];

        if($err)    $response['errors'] = $err;
        if($old)    $response['old'] = $old;

        return response()->json($response, 400);
    }

    /**
     * created - returns 201 created resource reponse
     *
     * @param mixed $data
     * @param mixed $createdObj
     * @param mixed $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function created($data, $createdObj, $msg = NULL) {
        $data['message'] = $msg ? $msg : ucwords($createdObj) . ' has been created successfully!';
        $data['status'] = 201;

        return response()->json($data, 201);
    }

    /**
     * forbidden - 403 error message
     *
     * @param mixed $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbidden($msg) {
        return response()->json([
            'message' => $msg,
            'status' => 403
        ], 403);
    }

    /**
     * notFound - not found 404 error response
     *
     * @param mixed $msg
     * @param mixed $obj
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFound($msg = NULL, $obj = NULL) {
        if(!$msg) {
            if(!$obj) {
                $msg = 'Not found';
            }
            $msg = 'This '. $obj .' is not found!';
        }

        return response()->json([
            'message' => $msg,
            'status' => 404,
        ], 404);
    }

    /**
     * internalServerError - for server errors 500
     *
     * @param mixed $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function internalServerError($msg) {
        return response()->json([
            'message' => $msg,
            'status' => 500
        ], 500);
    }
}
