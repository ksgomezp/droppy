<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class City extends Model
{
    protected $fillable = ['name', 'stateId'];

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stateId' => 'required',
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

    public function getStateId()
    {
        return $this->attributes['stateId'];
    }

    public function setStateId($stateId)
    {
        $this->attributes['stateId'] = $stateId;
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
