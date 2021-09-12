<?php

namespace App\Http\Repositories;



use App\Models\Country;

class MainReopsitory{
    protected $model;

    public function __construct($model){
        $this->model = $model;

    }

    public function getall(){
       return $this->model::latest()->get();

    }

    public function store($attributes){
        return $this->model::create($attributes);
    }

    public function get($id){
        return $this->model::findorfail($id);
    }

    public function getCount(){
        return $this->model::count();
    }

    public function update($id, $attributes){
         $this->model::find($id)->update($attributes);
         return $this->model::find($id);
    }

    public function delete($id){
        return $this->model::destroy($id);
    }

    public function deleteAll(){
        return $this->model::truncate();
    }

    public function getMore($id){
         
        return $this->model::where('id','>',$id)->orderBy('id')->take(4)->get();
    }
}
