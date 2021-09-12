<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pakage extends Model
{

    protected $table = 'pakages';
    public $timestamps = true;
    protected $fillable = array('type', 'price', 'body', 'duration');
public function payments(){

    return $this->hasMany(Payment::class);
}


}
