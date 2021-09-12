<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriper extends Model
{

    protected $table = 'subscribers';
    public $timestamps = true;
    protected $fillable = array('name', 'email');

}
