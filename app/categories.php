<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{

    public $fillable = ['title'];

    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
