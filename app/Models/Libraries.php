<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libraries extends Model
{
    protected $table = 'libraries';
    use HasFactory;
    protected $guarded = [] ;
}