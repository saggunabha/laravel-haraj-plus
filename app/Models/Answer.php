<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $table = 'answers';
    public $timestamps = true;
    protected $fillable = array('ask_id', 'answer');

    public function question()
    {
        return $this->belongsTo(Ask::class);
    }

}
