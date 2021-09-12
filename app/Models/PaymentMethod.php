<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{

    protected $table = 'paymentMethods';
    public $timestamps = true;
    protected $fillable = array('type', 'image');

    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }

}
