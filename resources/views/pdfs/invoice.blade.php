<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $record->booking_code }}</title>
    <style>
        /* CSS yang dirancang untuk DomPDF */
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        }
        .header {
            width: 100%;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #000;
            font-size: 24px;
        }
        .details-table {
            width: 100%;
            margin-bottom: 40px;
        }
        .invoice-items-table {
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }
        .invoice-items-table th, 
        .invoice-items-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .invoice-items-table thead th {
            background-color: #f2f2f2; /* Warna header tabel abu-abu muda */
            font-weight: bold;
            color: #555;
            border-bottom: 2px solid #ddd;
        }
        .text-right {
            text-align: right;
        }
        .total-section {
            margin-top: 30px;
            text-align: right;
        }
        .total-section table {
            width: 50%;
            margin-left: auto;
            border-collapse: collapse;
        }
        .total-section td {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }
        .total-section .grand-total {
            font-weight: bold;
            font-size: 1.2em;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table class="header">
            <tr>
                <td>
                    <h1>Cinema Gemilang</h1>
                    Invoice: #{{ $record->booking_code }}<br>
                    Tanggal: {{ $record->created_at->format('d F Y, H:i') }}
                </td>
            </tr>
        </table>
        
        <table class="details-table">
             <tr>
                <td>
                    <strong>Ditagihkan kepada:</strong><br>
                    {{ $record->user->name }}<br>
                    {{ $record->user->email }}
                </td>
            </tr>
        </table>

        <table class="invoice-items-table">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th class="text-right">Jumlah</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>Tiket Film: {{ $record->showtime->movie->title }}</strong>
                        <br>
                        <small>Jadwal: {{ $record->showtime->start_time->format('d M Y, H:i') }} di {{ $record->showtime->studio->name }}</small>
                        <br>
                        <small>Kursi yang di pesan: {{$record->bookingseats->pluck('seat_number')->implode(', ')}}</small>
                    </td>
                    <td class="text-right">{{ $record->quantity }}</td>
                    <td class="text-right">Rp {{ number_format($record->total_price / $record->quantity) }}</td>
                    <td class="text-right">Rp {{ number_format($record->total_price) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total-section">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td class="text-right">Rp {{ number_format($record->total_price) }}</td>
                </tr>
                <tr class="grand-total">
                    <td>Total</td>
                    <td class="text-right">Rp {{ number_format($record->total_price) }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>