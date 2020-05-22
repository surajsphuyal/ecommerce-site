<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['address', 'phone','cart','user_id','paid_at','paid_amt'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
