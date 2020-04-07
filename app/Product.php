<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'stock', 'price'];

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:255',
            'stock' => 'required|numeric|gte:0',
            'price' => 'required|numeric|gte:0'
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($category)
    {
        $this->attributes['category'] = $category;
    }

    public function getStock()
    {
        return $this->attributes['stock'];
    }

    public function setStock($stock)
    {
        $this->attributes['stock'] = $stock;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
