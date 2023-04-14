<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'attendance_id',
        'created_at',
        'updated_at',
        'start_time',
        'end_time',


    ];


    
}
