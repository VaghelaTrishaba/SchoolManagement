<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'roll',
        'name',
        'type',
    ];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }
}
?>