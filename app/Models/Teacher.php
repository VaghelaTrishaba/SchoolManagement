<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        "class_id",
        "name",
    ];

    public function class()
    {
        return $this->belongsTo(classes::class);
    }

    public function subteacher()
    {
        return $this->hasMany(SubjectTeacher::class);
    }
}
