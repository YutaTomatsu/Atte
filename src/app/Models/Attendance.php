<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'created_at',
        'updated_at',
        'start_time',
        'end_time',


    ];
    public static function rules()
{
    return [
        'work_date' => 'unique:attendances,work_date,NULL,id,user_id,' . auth()->id(),
    ];
}
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
