<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clause extends Model
{
    protected $fillable = [
        'name',
        'week_day',
        'class_time',
        'end_date',
        'course_id'
    ];

    protected $table = 'clauses';

    use HasFactory;
    public function homework(){
        return $this->hasMany(Homework::class);
    }
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function presentStudents() {
        return Attendance::where('clasuse_id', $this->id)->count();
    }
}
