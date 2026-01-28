<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'subject',
        'marks',
        'duration',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
?>