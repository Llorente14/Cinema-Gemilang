<?php

namespace App\Models;

use App\Enums\AgeRating;
use App\Enums\MovieStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use SoftDeletes;
  //Semua field Movie bisa diisi
  public $guarded = [];

  //Relasi ke Showtime (One Movie To Many Showtimes)
  public function showtimes(): HasMany
  {
    return $this->hasMany(Showtime::class);
  }

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'status' => MovieStatus::class,
    'age_rating' => AgeRating::class, // <-- Casting di sini
    'release_date' => 'date',
  ];
}
