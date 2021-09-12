<?php
/**
 * Created by PhpStorm.
 * User: NM NM
 * Date: 23/12/2019
 * Time: 05:39 م
 */

namespace App\Http\Services;


use App\Http\Repositories\MainReopsitory;
use App\Models\Payment;

class CommissionService
{
    public function __construct(Payment $payment)
    {
        $this->repo = new MainReopsitory($payment);
    }

    public function getCommissionsService()
    {
        return Payment::where('type',0)->get();
    }


//    public function destroyCommissionService($id)
//    {
//        $this->repo->delete($id);
//        return response()->json();
//
//    }
}
