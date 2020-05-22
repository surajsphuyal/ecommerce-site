<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id', 'address', 'city', 'country', 'zip', 'number', 'email'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
