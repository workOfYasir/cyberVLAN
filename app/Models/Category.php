<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'category_name',
        'slug',
        'status'
    ];

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
    public function mainCategory()
    {
        return $this->belongsTo('App\Models\Category', 'parent_category', 'id');
    }
    public function subCategory()
    {
        return $this->hasMany('App\Models\Category', 'parent_category', 'id');
    }
}
