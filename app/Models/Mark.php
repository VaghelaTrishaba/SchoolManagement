<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'student_id',
        'marks',
    ];

    public function studentanswer()
    {
        return $this->belongsTo(StudentAnswer::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
?>