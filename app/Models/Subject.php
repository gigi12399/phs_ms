<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
    ];

    public function teacher_guides()
    {
        return $this->hasMany(TeacherGuide::class);
    }
    
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    

}
