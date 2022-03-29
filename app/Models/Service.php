<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=[
        'service_title',
        'category_id',
        'description'
    ];
    public function category(){
        return $this->belongsTo('App\Models\Category')->with('mainCategory');
    }

}
