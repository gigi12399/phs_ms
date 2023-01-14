<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'day_id',
        'period_id',
        'teacher_guide_id',
        'academic_year_id',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    // public function teacher_guide()
    // {
    //     return $this->belongsTo(TeacherGuide::class);
    // }
    
}
