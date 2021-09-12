<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{

    protected $table = 'staticPages';
    public $timestamps = true;
    protected $fillable = array('name', 'description','url');

}
