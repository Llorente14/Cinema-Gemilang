<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use SoftDeletes;
    //Semua field Booking bisa diisi
    public $guarded = [];

    //Relasi One User To Many Bookings
      public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

     //Relasi One Showtime To Many Bookings
      public function showtime(): BelongsTo
    {
        return $this->belongsTo(Showtime::class);
    }
}
