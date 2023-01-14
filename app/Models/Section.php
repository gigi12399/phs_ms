<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'grade_id',
        'description',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function student_histories()
    {
        return $this->hasMany(StudentHistory::class);
    }

    // public function teacher_guides()
    // {
    //     return $this->hasMany(TeacherGuide::class);
    // }

}
