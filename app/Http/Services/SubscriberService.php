<?php
/**
 * Created by PhpStorm.
 * User: NM NM
 * Date: 13/12/2019
 * Time: 03:46 م
 */

namespace App\Http\Services;


use App\Http\Repositories\MainReopsitory;
use App\Models\Subscriper;

class SubscriberService
{
    public function __construct(Subscriper $subscriper)
    {
        $this->repo = new MainReopsitory($subscriper);
    }

    public function getSubscribersService()
    {
        return $this->repo->getall();
    }


    public function destroySubscriberService($id)
    {
        $this->repo->delete($id);
        return response()->json();

    }
}