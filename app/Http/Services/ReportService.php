<?php
/**
 * Created by PhpStorm.
 * User: NM NM
 * Date: 19/12/2019
 * Time: 10:07 ص
 */

namespace App\Http\Services;


use App\Http\Repositories\MainReopsitory;
use App\Models\Report;

class ReportService
{

    public function __construct(Report $report)
    {
        $this->repo = new MainReopsitory($report);
    }

    public function getReportsService()
    {
        return $this->repo->getall();
    }


    public function destroyReportService($id)
    {
        $this->repo->delete($id);
        return response()->json();

    }

}