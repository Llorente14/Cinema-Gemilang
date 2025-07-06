<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Studio extends Model
{
    use SoftDeletes;
    //Semua field Studio bisa diisi
    public $guarded = [];

    //Relasi One Studio To Many Showtimes
    public function showtimes(): HasMany
    {
        return $this->hasMany(Showtime::class);
    }
}
