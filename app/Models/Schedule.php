<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ["origin_id",    "destination_id",    "distance", "trains_id",    "departure",     "arrival",     "price"];


    public function route()
    {
        return $this->belongsTo(Route::class, "destination_id", "id");
    }
    public function route2()
    {
        return $this->belongsTo(Route::class, "origin_id", "id");
    }
    public function train()
    {
        return $this->belongsTo(Trains::class, "trains_id", "id");
    }
}
