<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('package_id', 'payment_type', 'user_id');
   
    public function user()
    {

        return $this->belongsTo(User::class);
    }


}
