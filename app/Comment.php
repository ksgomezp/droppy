<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    Public static function validate($request){
      $request->validate([
         "description" => "required"
      ]);
    }
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['description'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getCreated()
    {
        return $this->attributes['created_at'];
    }
}
