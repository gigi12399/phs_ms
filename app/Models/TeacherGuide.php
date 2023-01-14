<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherGuide extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'teacher_id',
        'subject_id',
        'section_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
