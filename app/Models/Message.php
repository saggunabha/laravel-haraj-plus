<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
//use Mpociot\Firebase\SyncsWithFirebase;

class Message extends Model
{
//  	use SyncsWithFirebase;

    protected $table = 'messages';
    public $timestamps = true;
    protected $fillable = array('sender_id','reciever_id','seen','content','file', 'product_id');

    public function getSender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function getReceiver()
    {
        return $this->belongsTo(User::class,'reciever_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

}
