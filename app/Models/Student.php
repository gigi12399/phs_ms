<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Student extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'nrc',
        'email',
        'gender',
        'phone',
        'birthday',
        'address',
        'profile',
        'section_id',
        'info',
    ];

    public function age()
    {
        return Carbon::parse($this->birthday)->age;
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function student_histories()
    {
        return $this->hasMany(StudentHistory::class);
    }
}
