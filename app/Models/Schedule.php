<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ["origin_id",    "destination_id",    "distance", "trains_id",    "departure",     "arrival",     "price"];
}
