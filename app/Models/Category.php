<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'parent_id','order');

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function category()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(self::class, 'parent_id' ,'id');
    }

}
