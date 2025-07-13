<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Performa Film</title>
    <style>
        /* CSS Reset & Basic Styling */
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            /* Ukuran font sedikit dikecilkan agar pas */
            color: #333;
            line-height: 1.4;
        }

        /* Header & Footer Styling */
        .header,
        .footer {
            width: 100%;
            position: fixed;
            left: 0;
            right: 0;
        }

        .header {
            top: 0;
            text-align: center;
            height: 100px;
            /* Perkiraan tinggi header */
        }

        .footer {
            bottom: 0;
            height: 40px;
            /* Perkiraan tinggi footer */
            font-size: 10px;
            color: #777;
        }

        .footer .page-number:after {
            content: counter(page);
            /* dompdf akan mengisi nomor halaman */
        }

        /* PERBAIKAN UTAMA: Mendorong konten utama ke bawah */
        main {
            margin-top: 110px;
        }

        /* Table Styling */
        .report-table {
            width: 100%;
            border-collapse: collapse;
        }

        .report-table th,
        .report-table td {
            border: 1px solid #ddd;
            padding: 6px;
            /* Padding sedikit dikecilkan */
            text-align: left;
            word-wrap: break-word;
            /* Memastikan teks panjang tidak keluar tabel */
        }

        .report-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        .report-table .text-right {
            text-align: right;
        }

        .report-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .report-table tfoot {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        /* Utility Classes */
        .company-name {
            font-size: 22px;
            font-weight: bold;
            color: #000;
        }

        .report-title {
            font-size: 16px;
            margin-top: 4px;
            margin-bottom: 4px;
            color: #555;
        }

        .report-period {
            font-size: 12px;
            color: #555;
        }

        hr {
            border: 0;
            border-top: 1px solid #eee;
            margin-top: 8px;
        }
    </style>
</head>

<body>

    {{-- Header PDF --}}
    <div class="header">
        <div class="company-name">Cinema Gemilang</div>
        <div class="report-title">Laporan Performa Film</div>
        <div class="report-period">
            Periode: {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} -
            {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
        </div>
        <hr>
    </div>

    {{-- Footer PDF --}}
    <div class="footer">
        <table style="width:100%; border:none;">
            <tr>
                <td style="text-align:left; border:none;">
                    Dicetak pada: {{ \Carbon\Carbon::now()->format('d M Y, H:i') }}
                </td>
                <td style="text-align:right; border:none;" class="page-number">
                    Halaman
                </td>
            </tr>
        </table>
    </div>

    {{-- Konten Utama: Tabel Laporan --}}
    <main>
        <table class="report-table">
            <thead>
                <tr>
                    <th>Judul Film</th>
                    <th>Jumlah Penonton</th>
                    <th>Pendapatan (Rp)</th>
                    <th>ATP (Rp)</th>
                    <th>Sesi Tayang</th>
                    <th>Penonton/Sesi</th>
                    <th>Okupansi (%)</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reportData as $row)
                    <tr>
                        <td>{{ $row['judul_film'] }}</td>
                        <td class="text-right">{{ number_format($row['jumlah_penonton'], 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($row['pendapatan_tiket'], 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($row['harga_tiket_rata_rata'], 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($row['total_sesi_tayang'], 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($row['rata_rata_penonton_per_sesi'], 1, ',', '.') }}
                        </td>
                        <td class="text-right">{{ number_format($row['tingkat_okupansi'], 2, ',', '.') }}%</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 20px;">Tidak ada data untuk periode ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td>Total Keseluruhan</td>
                    <td class="text-right">{{ number_format($totals['jumlah_penonton'], 0, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($totals['pendapatan_tiket'], 0, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($totals['harga_tiket_rata_rata'] ?? 0, 0, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($totals['total_sesi_tayang'], 0, ',', '.') }}</td>
                    <td class="text-right">
                        {{ number_format($totals['rata_rata_penonton_per_sesi'] ?? 0, 1, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($totals['tingkat_okupansi'] ?? 0, 2, ',', '.') }}%</td>
                </tr>
            </tfoot>
        </table>
    </main>

</body>

</html>
