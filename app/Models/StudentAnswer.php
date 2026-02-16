<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'question_id',
        'answer',
    ];

    public function mark()
    {
        return $this->hasMany(Mark::class);
    }

    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class, 'question_id');
    }

}
