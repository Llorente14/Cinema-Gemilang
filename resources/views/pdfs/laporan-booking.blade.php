<!DOCTYPE html>
<html>
<head>
    <title>Laporan Booking</title>
    <style>
        /* CSS sederhana untuk PDF */
        body { font-family: sans-serif; font-size: 12px; }
        .invoice-box { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; }
        .page-break { page-break-after: always; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h1>Laporan Pemesanan</h1>
    @foreach ($records as $record)
        <div class="invoice-box">
            <h2>Invoice: #{{ $record->booking_code }}</h2>
            <p>Pemesan: {{ $record->user->name }}</p>
            <p>Film: {{ $record->showtime->movie->title }}</p>
            <p>Total: Rp {{ number_format($record->total_price) }}</p>
        </div>
        @if (!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
</body>
</html>