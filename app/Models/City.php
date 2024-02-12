<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
