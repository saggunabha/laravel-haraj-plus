<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankAccountRequest;
use App\Http\Services\BankAccountService;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(BankAccountService $service)
    {
        $this->service = $service;

    }

    public function index()
    {
        $bankAccounts = $this->service->getBankAccountsService();
        return view('admin.bank-accounts.index',compact('bankAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.bank-accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountRequest $request)
    {
        $this->service->storeBankAccountService($request);
        return redirect(route('bank-accounts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bankAccount = $this->service->editBankAccountService($id);
        return view('admin.bank-accounts.edit',compact('bankAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankAccountRequest $request, $id)
    {
        $this->service->updateBankAccountService($request,$id);
        return redirect(route('bank-accounts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->destroyBankAccountService($id);

        return response()->json(['success' => 'true']);
    }
}
