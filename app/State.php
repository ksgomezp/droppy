<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class State extends Model
{
    protected $fillable = ['name', 'countryId'];

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'countryId' => 'required'
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

    public function getCountryId()
    {
        return $this->attributes['countryId'];
    }

    public function setCountryId($countryId)
    {
        $this->attributes['countryId'] = $countryId;
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
