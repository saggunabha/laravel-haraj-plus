<?php
/**
 * Created by PhpStorm.
 * User: NM NM
 * Date: 01/12/2019
 * Time: 04:29 م
 */

namespace App\Http\Services;


use App\Http\Repositories\MainReopsitory;
use App\Models\StaticPages;
use Illuminate\Http\Request;

class StaticPageService
{
    public function __construct(StaticPages $staticPage)
    {
        $this->repo = new MainReopsitory($staticPage);
    }

    public function getStaticPagesService()
    {
        return $this->repo->getall();
    }


    public function editStaticPageService($id){
        return $this->repo->get($id);
    }

    public function updateStaticPageService(Request $request, $id)
    {
        $this->repo->get($id)->update($request->all());
        return response()->json();
    }
}