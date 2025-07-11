<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
  use SoftDeletes;
  //Semua field Booking bisa diisi
  public $guarded = [];

  //Relasi One BookingSeat To Many Booking
  public function bookingseats(): HasMany
  {
    return $this->hasMany(BookingSeat::class);
  }

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


  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'status' => BookingStatus::class,

  ];
}
