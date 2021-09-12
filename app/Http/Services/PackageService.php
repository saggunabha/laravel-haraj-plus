<?php
/**
 * Created by PhpStorm.
 * User: NM NM
 * Date: 04/12/2019
 * Time: 02:48 م
 */

namespace App\Http\Services;


use App\Http\Repositories\MainReopsitory;
use App\Models\Pakage;
use Illuminate\Http\Request;

class PackageService
{
    public function __construct(Pakage $package)
    {
        $this->repo = new MainReopsitory($package);
    }

    public function getPackagesService()
    {
        return $this->repo->getall();
    }

    public function storePackageService(Request $request)
    {
        return $this->repo->store($request->all());
    }

    public function editPackageService($id){
        return $this->repo->get($id);
    }

    public function updatePackageService(Request $request, $id)
    {
        $this->repo->get($id)->update($request->all());
    }

    public function destroyPackageService($id)
    {
        $this->repo->delete($id);
        return response()->json();

    }
}