<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerWork extends Model
{
    use HasFactory;
    protected $fillable = ['user_details_id','starting_date','ending_date','company','designation','description'];

    
}
