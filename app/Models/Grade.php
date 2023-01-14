<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
    ];

    // public function academic_year()
    // {
    //     return $this->belongsTo(AcademicYear::class);
    // }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    
    // public function subjects()
    // {
    //     return $this->belongsToMany(Subject::class)->withTimestamps();
    // }
}
