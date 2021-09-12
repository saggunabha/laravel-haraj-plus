<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{

    protected $table = 'images';
    public $timestamps = true;



    protected $fillable = array('path', 'product_id');

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
