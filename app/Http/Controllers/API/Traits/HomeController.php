<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\API\Traits\ApiResponseTrait;

class HomeController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data ='https://haraj-plus.sa/'; 
        return $this->ApiResponse($data);

    }
}



