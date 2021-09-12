<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tech extends Model
{
    protected $table = 'tech';
    public $timestamps = true;

    protected $fillable = ['user_id','name','email','subject','message','parent_id'];

    public function replay()
    {
        return $this->hasOne(Tech::class, 'parent_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}