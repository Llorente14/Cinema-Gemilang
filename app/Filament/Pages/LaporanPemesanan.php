<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class LaporanPemesanan extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';
    protected static string $view = 'filament.pages.laporan-pemesanan';
    protected static ?string $navigationLabel = 'Laporan Pemesanan';
    protected static ?string $navigationGroup = 'Laporan & Transaksi';

    // Properti untuk menampung data filter dan hasil
    public ?string $tanggal_awal = null;
    public ?string $tanggal_akhir = null;
    public Collection $records;

    public function getTitle(): string
    {
        return 'Laporan Pemesanan Tiket';
    }

    // Inisialisasi data saat halaman pertama kali dimuat
    public function mount(): void
    {
        $this->form->fill();
        $this->records = collect(); // Awalnya kosong
    }

    // Mendefinisikan form filter
    public function form(Form $form): Form
    {
        return $form->schema([
            DatePicker::make('tanggal_awal')->label('Tanggal Awal')->default(now()->startOfMonth()),
            DatePicker::make('tanggal_akhir')->label('Tanggal Akhir')->default(now()->endOfMonth()),
        ])->columns(2);
    }

    // Aksi yang dijalankan saat tombol "Tampilkan Laporan" diklik
    public function tampilkanLaporan(): void
    {
        $data = $this->form->getState();
        $this->records = Booking::with(['user', 'showtime.movie'])
            ->whereBetween('created_at', [$data['tanggal_awal'], $data['tanggal_akhir']])
            ->get();
    }

    // Aksi untuk mengunduh PDF dari data yang sudah difilter
    public function unduhPdf()
    {
        if ($this->records->isEmpty()) {
            // Bisa tambahkan notifikasi error jika data kosong
            return;
        }
        $fileName = 'laporan-pemesanan-' . now()->format('Y-m-d') . '.pdf';
        $pdf = Pdf::loadView('pdfs.laporan-booking', ['records' => $this->records]);
        return response()->streamDownload(fn() => print($pdf->output()), $fileName);
    }
}
