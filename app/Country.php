<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Country extends Model
{
    protected $fillable = ['name'];

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries,name'
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
