<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['category_id', 'title', 'slug', 'description', 'size', 'image', 'price', 'stock'];

    public function category()
    {
       return $this->belongsTo(categories::class);
    }
}
