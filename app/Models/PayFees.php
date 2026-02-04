<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayFees extends Model
{
    use HasFactory;
    protected $table = 'payfees';
    protected $fillable = [
        'name',
        'amount',
        'mode',
    ];

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];

}

?>