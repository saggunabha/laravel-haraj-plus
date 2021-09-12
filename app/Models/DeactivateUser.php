<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeactivateUser extends Model
{
    protected $table='deactivation_user';
    public $timestamps = true;
    protected $fillable=['user_id','type','period'];



}
