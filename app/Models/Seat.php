<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ["trains_id", "coaches_id",    "seat_no",    "status"];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
    public function train()
    {
        return $this->belongsTo(Trains::class);
    }
}
