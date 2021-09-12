<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{

    protected $table = 'asks';
    public $timestamps = true;
    protected $fillable = array('ask');

    public function answer()
    {
        return $this->hasOne('App/Models\Answer');
    }

}
