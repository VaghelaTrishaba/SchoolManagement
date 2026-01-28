<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddTeacher extends Model
{
    use HasFactory;

    protected $table = 'addteachers';
    protected $fillable = [
        'firstName',
        'secondName',
        'gender',
        'email',
        'mobile',
        'image',
        'birth',
        'qualification',
    ];
}
