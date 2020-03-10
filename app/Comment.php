<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Product;

class Comment extends Model
{
    protected $fillable = ['description', 'productId'];

    public static function validate(Request $request)
    {
        $request->validate([
            "description" => "required"
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($desc)
    {
        $this->attributes['description'] = $desc;
    }

    public function getProductId()
    {
        return $this->attributes['productId'];
    }

    public function setProductId($pId)
    {
        $this->attributes['productId'] = $pId;
    }

    public function getCreated()
    {
        return $this->attributes['created_at'];
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
