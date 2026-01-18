<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        "class_id",
        "sub1",
        "sub2",
        "sub3",
        "sub4",
        "sub5",
        "sub6",
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
