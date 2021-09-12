<?php


namespace App\Http\Services;


use App\Classes\FileOperations;
use App\Http\Repositories\MainReopsitory;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankAccountService
{
    private $imageDirectory = 'bank-accounts';

    public function __construct(BankAccount $bankAccount)
    {
        $this->repo = new MainReopsitory($bankAccount);
    }

    public function getBankAccountsService()
    {
        return $this->repo->getall();
    }

    public function storeBankAccountService(Request $request)
    {   $requestData = $request->all();
        $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->file('logo'), time(). 'bank_account_img');
        $requestData['logo'] = $pathAfterUpload;

        return $this->repo->store($requestData);
    }

    public function editBankAccountService($id){
        return $this->repo->get($id);
    }

    public function updateBankAccountService(Request $request, $id)
    {
        $bankAccount = $this->repo->get($id);
        $requestData=$request->all();
        if ($file = $request->hasFile('logo')) {
            Storage::delete($bankAccount->logo);
            $pathAfterUpload = FileOperations::StoreFile($this->imageDirectory, $request->logo);
            $requestData['logo'] = $pathAfterUpload;




        }
        $this->repo->get($id)->update($requestData);
    }

    public function destroyBankAccountService($id)
    {
        $bankAccount = $this->repo->get($id);
        Storage::delete($bankAccount->image);
        $this->repo->delete($id);
        return response()->json();

    }
}
