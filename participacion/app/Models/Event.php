<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'describtion', 'start_time', 'end_time'];
    protected $cast = [
        'start_time' => 'dateTime',
        'end_time'=> 'dateTime',
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
