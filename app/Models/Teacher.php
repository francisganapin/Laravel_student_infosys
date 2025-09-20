<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //

    use HasFactory;

    protected $fillable =[
        'first_name',
        'last_name',
        'email',
        'phone',
        'department',
    ];



    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'subject_teacher');
    }
}
