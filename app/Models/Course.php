<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function clauses(){
        return $this->hasMany(Clause::class);
    }
    public function students(){
        return $this->belongsToMany(User::class,'course_student','course_id','user_id');
    }
}
