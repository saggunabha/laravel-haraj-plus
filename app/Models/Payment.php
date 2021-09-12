<?php

namespace App\Models;

use App\Models\BankAccount;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{



    protected $table = 'payments';
    public $timestamps = true;
    protected $fillable = array( 'user_id','money_amount','pakage_id','paymentMethod', 'transfer_date', 'transferee_name', 'product_id','bank_no', 'bankAccount_id','is_accepted','image','type', 'notes');

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bankAccount_id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function pakage()
    {
        return $this->belongsTo(Pakage::class);
    }

}
