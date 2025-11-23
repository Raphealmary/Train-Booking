<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formcreated extends Model
{

    public $fillable = ["username", "password"];
    /** @use HasFactory<\Database\Factories\FormcreatedFactory> */
    use HasFactory;
}
