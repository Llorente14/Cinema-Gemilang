<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;


class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        //1. Persiapan Data Untuk Pendapatan Hari Ini
        //Mendapatkan pendapatan untuk hari ini
        //SELECT SUM(total_price) FROM BOOKING WHERE created_at > sysdate
        //Di Laravel, filter dahulu (where dahulu baru di sum)
        $pendapatanHariIni = Booking::whereDate('created_at', today())->sum('total_price');
        $pendapatanKemarin = Booking::whereDate('created_at', today()->subDay())->sum('total_price');
        $persentasePendapatan = 0;
        if ($pendapatanKemarin > 0) {
            $persentasePendapatan = (($pendapatanHariIni - $pendapatanKemarin) / $pendapatanKemarin) * 100;
        } elseif ($pendapatanHariIni > 0) {
            $persentasePendapatan = 100; // Jika kemarin 0, anggap kenaikan 100%
        }
        $deskripsiPendapatan = $this->formatDescription($persentasePendapatan, 'dari kemarin');

        // 2. Persiapan Data Untuk STATISTIK TIKET TERJUAL
        $tiketHariIni = Booking::whereDate('created_at', today())->sum('quantity');
        $tiketKemarin = Booking::whereDate('created_at', today()->subDay())->sum('quantity');

        $persentaseTiket = 0;
        if ($tiketKemarin > 0) {
            $persentaseTiket = (($tiketHariIni - $tiketKemarin) / $tiketKemarin) * 100;
        } elseif ($tiketHariIni > 0) {
            $persentaseTiket = 100;
        }
        $deskripsiTiket = $this->formatDescription($persentaseTiket, 'dari kemarin');

        //3. Persiapan Data untuk Movie Terlaris Minggu ini
        $movieTerlaris = Booking::query()
            ->selectRaw('movies.title, SUM(bookings.quantity) as tiket_terjual')
            ->join('showtimes', 'bookings.showtime_id', '=', 'showtimes.id')
            ->join('movies', 'movies.id', '=', 'showtimes.movie_id')
            ->where('bookings.created_at', '>=', now()->subWeek())
            ->groupBy('movies.title')
            ->orderByDesc('tiket_terjual')
            ->first();


        return [
            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format($pendapatanHariIni))
                ->description($deskripsiPendapatan)
                ->color($persentasePendapatan >= 0 ? 'success' : 'danger')
                ->descriptionIcon($persentasePendapatan >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down'),

            Stat::make('Tiket Terjual Hari Ini', number_format($tiketHariIni) . ' tiket')
                ->description($deskripsiTiket)
                ->descriptionIcon($persentaseTiket >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($persentaseTiket >= 0 ? 'success' : 'danger'),

            Stat::make('Film Terlaris (Minggu Ini)', $movieTerlaris->title ?? 'Belum ada data')
                ->description($movieTerlaris ? (number_format($movieTerlaris->tiker_terjual) . ' tiket terjual') : 'N/A')
                ->descriptionIcon('heroicon-m-film')
                ->color('info'),
        ];
    }

    //Helper function untuk deskripsi
    private function formatDescription(float $percentage, string $period): string
    {
        if ($percentage > 0) {
            return 'Naik ' . round($percentage) . '% ' . $period;
        } elseif ($percentage < 0) {
            return 'Turun ' . abs(round($percentage)) . '% ' . $period;
        }
        return 'Sama seperti ' . $period;
    }
}
