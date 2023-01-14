<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Day extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'name',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
