<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function payment()
    {
        return $this->hasOne('App\Models\PaymentReciever','payment_id','id')->with('user');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User','unni_id','sender_unni_id')->with('userDetails');
    }
    public function post()
    {
        return $this->belongsTo('App\Models\Post','post_id','id')->with('postDetail');
    }

}
