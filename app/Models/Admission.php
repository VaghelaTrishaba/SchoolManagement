<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
        
class Admission extends Model
{
    use HasFactory;
    protected $fillable=[
            'firstName',
            'secondName',
            'mobile',
            'gender',
            'image',
            'birth',
            'category',
            'grNumber',
            'admissionDate',
            'fatherName',
            'fatherMobile',
            'fatherImage',
    ];

    public function mark()
    {
        return $this->hasMany(Mark::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
