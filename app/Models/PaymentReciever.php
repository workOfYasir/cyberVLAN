<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReciever extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','unni_id','unni_id')->with('userDetails');
    }

}
