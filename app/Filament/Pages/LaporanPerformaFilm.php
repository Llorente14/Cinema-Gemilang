<?php

namespace App\Filament\Pages;

use App\Enums\BookingStatus;
use App\Models\Booking;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class LaporanPerformaFilm extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';
    protected static string $view = 'filament.pages.laporan-performa-film';
    protected static ?string $navigationGroup = 'Laporan & Transaksi';
    protected static ?string $navigationLabel = 'Laporan Penjualan';
    protected static ?int $navigationSort = 1;

    public ?array $data = [];

    public array $reportData = [];
    public array $totals = [];

    public function mount(): void
    {
        $this->data = [
            'startDate' => Carbon::now()->subMonth()->startOfDay()->toDateString(),
            'endDate' => Carbon::now()->endOfDay()->toDateString(),
        ];
        $this->form->fill($this->data);
        $this->generateReportData();
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                // Menghapus ->reactive() agar form tidak update otomatis
                DatePicker::make('startDate')
                    ->label('Tanggal Mulai'),
                DatePicker::make('endDate')
                    ->label('Tanggal Akhir'),
            ])->columns(2);
    }

    // Method updatedData() dihapus karena tidak lagi diperlukan.

    // --- PERUBAHAN: Method diubah menjadi public ---
    // agar bisa dipanggil oleh wire:submit dari frontend
    public function generateReportData(): void
    {
        // Menggunakan Enum untuk status yang valid
        $validStatus = BookingStatus::Confirmed;

        $startDate = $this->data['startDate'];
        $endDate = $this->data['endDate'];

        $bookings = Booking::query()
            ->where('status', $validStatus)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->with(['showtime.movie', 'showtime.studio'])
            ->get();

        $groupedByMovie = $bookings->groupBy('showtime.movie.id');

        $this->reportData = $groupedByMovie->map(function ($movieBookings) {
            $firstBooking = $movieBookings->first();
            if (!$firstBooking || !$firstBooking->showtime || !$firstBooking->showtime->movie) {
                return null;
            }
            $movieTitle = $firstBooking->showtime->movie->title;
            $jumlah_penonton = $movieBookings->sum('quantity');
            $pendapatan_tiket = $movieBookings->sum('total_price');
            $uniqueShowtimes = $movieBookings->pluck('showtime')->unique('id');
            $total_sesi_tayang = $uniqueShowtimes->count();
            $total_kapasitas = $uniqueShowtimes->sum(function ($showtime) {
                if ($showtime && $showtime->studio) {
                    return $showtime->studio->seat_rows * $showtime->studio->seat_columns;
                }
                return 0;
            });

            return [
                'judul_film' => $movieTitle,
                'jumlah_penonton' => $jumlah_penonton,
                'pendapatan_tiket' => $pendapatan_tiket,
                'total_sesi_tayang' => $total_sesi_tayang,
                'harga_tiket_rata_rata' => $jumlah_penonton > 0 ? $pendapatan_tiket / $jumlah_penonton : 0,
                'rata_rata_penonton_per_sesi' => $total_sesi_tayang > 0 ? $jumlah_penonton / $total_sesi_tayang : 0,
                'tingkat_okupansi' => $total_kapasitas > 0 ? ($jumlah_penonton / $total_kapasitas) * 100 : 0,
            ];
        })->filter()->sortByDesc('pendapatan_tiket')->values()->all();

        // --- PERUBAHAN DIMULAI DI SINI ---

        // 1. Hitung total dasar
        $this->totals = [
            'jumlah_penonton' => array_sum(array_column($this->reportData, 'jumlah_penonton')),
            'pendapatan_tiket' => array_sum(array_column($this->reportData, 'pendapatan_tiket')),
            'total_sesi_tayang' => array_sum(array_column($this->reportData, 'total_sesi_tayang')),
        ];

        // 2. Hitung total kapasitas dari semua showtime yang relevan
        $total_kapasitas_keseluruhan = $groupedByMovie->flatten()->pluck('showtime')->unique('id')->sum(function ($showtime) {
            if ($showtime && $showtime->studio) {
                return $showtime->studio->seat_rows * $showtime->studio->seat_columns;
            }
            return 0;
        });

        // 3. Hitung nilai rata-rata dan persentase untuk total keseluruhan
        $this->totals['harga_tiket_rata_rata'] = ($this->totals['jumlah_penonton'] > 0)
            ? $this->totals['pendapatan_tiket'] / $this->totals['jumlah_penonton']
            : 0;

        $this->totals['rata_rata_penonton_per_sesi'] = ($this->totals['total_sesi_tayang'] > 0)
            ? $this->totals['jumlah_penonton'] / $this->totals['total_sesi_tayang']
            : 0;

        $this->totals['tingkat_okupansi'] = ($total_kapasitas_keseluruhan > 0)
            ? ($this->totals['jumlah_penonton'] / $total_kapasitas_keseluruhan) * 100
            : 0;
    }
}
