<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Teacher extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'profile',
        'gender',
        'birthday',
        'degree',
        'nrc',
        'phone',
        'address',
        'email',
        'salary',
        'description',
    ];

    public function age()
    {
        return Carbon::parse($this->birthday)->age;
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class)->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    // public function teacher_guides()
    // {
    //     return $this->hasMany(TeacherGuide::class);
    // }

}
