<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_sms extends Model
{
    protected $fillable = ['user_id', 'user_sms', 'expired_at'];
}
