<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
        
class Assgin extends Model
{
    use HasFactory;
    protected $fillable=[
            'subject',
            'file',
            'date'
    ];

}
