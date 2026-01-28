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

}
