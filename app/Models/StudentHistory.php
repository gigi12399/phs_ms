<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentHistory extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'student_id',
        'section_id',
        'academic_year_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
