<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'describtion', 'start_time', 'end_time'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
