<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{

    protected $table = 'bankAccounts';
    public $timestamps = true;
    protected $fillable = array('name', 'number', 'iban_number', 'logo');

    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }






}
