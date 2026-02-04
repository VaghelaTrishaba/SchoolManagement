<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'name',
        'amount',
        'status',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
?>