<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use HasFactory, softDeletes;
    
    protected $fillable = [
        'year_one',
        'year_two',
    ];

    // public function grades()
    // {
    //     return $this->hasMany(Grade::class);
    // }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function student_histories()
    {
        return $this->hasMany(StudentHistory::class);
    }
}
