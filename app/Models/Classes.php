<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "medium",
        "stream",
        "section",
    ];

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
    public function  exam()
    {
        return $this->hasMany(Exam::class);
    }
    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }

    public function subteacher()
    {
        return $this->hasMany(SubjectTeacher::class);
    }
}
