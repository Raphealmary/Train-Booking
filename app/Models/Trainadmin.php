<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Trainadmin extends Authenticatable
{

    protected $fillable = ["name", "email", "password"];
    /** @use HasFactory<\Database\Factories\TrainadminFactory> */
    use HasFactory;

    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }
}
