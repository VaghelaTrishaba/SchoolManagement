<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Section extends Model
{
    use HasFactory,Notifiable,HasApiTokens;
    protected $fillable = [
        'name',
    ];
    protected function casts(): array
    {   
        return[
            'password'=>'hashed',
        ];
    }
}
?>