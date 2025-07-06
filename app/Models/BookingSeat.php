<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingSeat extends Model
{
    /**
     * timestamps tidak dibutuhkan untuk tabel ini.
     * @var bool
     */
    public $timestamps = false;

    /**
     * Field yang bisa diisi secara massal.
     * @var array
     */
    protected $fillable = [
        'booking_id',
        'seat_number',
    ];

    //Relasi One Booking To Many BookingSeat
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}