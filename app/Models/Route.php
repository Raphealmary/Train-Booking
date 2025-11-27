<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ["journey_route"];



    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
