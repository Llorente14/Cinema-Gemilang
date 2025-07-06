<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Showtime extends Model
{
  use SoftDeletes;
  //Semua field Showtime bisa diisi
  public $guarded = [];

  //Relasi One Movie To Many Showtime
  public function movie(): BelongsTo
  {
    return $this->belongsTo(Movie::class);
  }

  //Relasi One Studio To Many Showtime
  public function studio(): BelongsTo
  {
    return $this->belongsTo(Studio::class);
  }

  //Relasi One Showtime To Many Bookings
  public function bookings(): HasMany
  {
    return $this->hasMany(Booking::class);
  }

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'start_time' => 'datetime', // 👈 Tambahkan baris ini
  ];
}
