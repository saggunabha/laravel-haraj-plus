<?php

namespace App\Http\Controllers\API\Traits;

/**
 * Tarit for standard Api Response
 * [
 * 'data',
 * 'message',
 * 'status'
 * ]
 */
trait ApiResponseTrait
{
    public $paginateNumber = 10;

public function ApiResponse($data = null , $message = null, $code = 200)
{
        $array =
        [
            'data'=>$data,
            'message' =>$message,
            'status'=>in_array($code ,$this->successCode())? true :false
        ];

        return response()->json($array,$code);
}

public function successCode()
{
    return [
        200 ,201 ,202
    ];
}

}


