<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trains extends Model
{
    protected $fillable = ["name", "number", "type"];

    public function train()
    {
        return $this->hasMany(Schedule::class);
    }
    // 

}
