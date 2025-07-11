<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TicketSalesChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Penjualan Tiket (7 Hari Terakhir)';

    // Properti ini membuat widget memanjang selebar halaman
    protected int | string | array $columnSpan = 'full';

    // Atur tinggi maksimal grafik agar tidak terlalu besar
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // 1. Siapkan rentang tanggal untuk 7 hari terakhir
        $startDate = now()->subDays(6)->startOfDay();
        $endDate = now()->endOfDay();

        // 2. Ambil data penjualan dari database dalam satu query
        $salesData = Booking::query()
            ->selectRaw('DATE(created_at) as date, SUM(quantity) as total_tickets')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->pluck('total_tickets', 'date');

        // 3. Siapkan label (tanggal) dan data (jumlah tiket) untuk grafik
        $labels = [];
        $data = [];
        $date = $startDate->copy();

        while ($date <= $endDate) {
            // Format tanggal untuk ditampilkan sebagai label di sumbu X
            $labels[] = $date->format('d M');

            // Ambil data penjualan untuk tanggal ini, atau 0 jika tidak ada
            $data[] = $salesData[$date->format('Y-m-d')] ?? 0;

            $date->addDay();
        }

        // 4. Kembalikan data dalam format yang dibutuhkan oleh ChartWidget
        return [
            'datasets' => [
                [
                    'label' => 'Tiket Terjual',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgb(54, 162, 235)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {

        return 'line';
    }
}
