<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $table = 'ratings';
    public $timestamps = true;
    protected $fillable = array('degree', 'comment', 'product_id', 'user_id');

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rates()
    {
        return $this->hasMany(Report::class,'rate_id');
    }

}
