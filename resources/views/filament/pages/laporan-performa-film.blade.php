<x-filament-panels::page>

    {{-- Form Filter Tanggal --}}
    <form wire:submit.prevent="generateReportData" class="space-y-4">
        {{ $this->form }}

        {{-- Tombol Submit --}}
        <div>
            <x-filament::button type="submit">
                Terapkan Filter
            </x-filament::button>
        </div>
    </form>

    {{-- Card untuk Tabel Laporan --}}
    <x-filament::card>
        {{-- PERBAIKAN 1: Cek apakah ada data sebelum menampilkan tabel --}}
        @if (!empty($reportData))
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    {{-- PERBAIKAN 2: Tambahkan kelas untuk dark mode --}}
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Judul Film</th>
                            <th scope="col" class="px-6 py-3 text-right">Jumlah Penonton</th>
                            <th scope="col" class="px-6 py-3 text-right">Pendapatan Tiket (Rp)</th>
                            <th scope="col" class="px-6 py-3 text-right">Harga Tiket Rata-rata (ATP)</th>
                            <th scope="col" class="px-6 py-3 text-right">Total Sesi Tayang</th>
                            <th scope="col" class="px-6 py-3 text-right">Rata-rata Penonton/Sesi</th>
                            <th scope="col" class="px-6 py-3 text-right">Tingkat Okupansi (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Menggunakan @foreach karena pengecekan data kosong sudah di atas --}}
                        @foreach ($reportData as $row)
                            {{-- PERBAIKAN 2: Tambahkan kelas untuk dark mode --}}
                            <tr class=" border-b  dark:border-gray-700 hover:bg-gray-800 dark:hover:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $row['judul_film'] }}
                                </th>
                                <td class="px-6 py-4 text-right">
                                    {{ number_format($row['jumlah_penonton'], 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    {{ number_format($row['pendapatan_tiket'], 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    {{ number_format($row['harga_tiket_rata_rata'], 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    {{ number_format($row['total_sesi_tayang'], 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    {{ number_format($row['rata_rata_penonton_per_sesi'], 1, ',', '.') }}
                                </td>
                                <td
                                    class="px-6 py-4 text-right font-medium {{ $row['tingkat_okupansi'] > 50 ? 'text-green-500' : 'text-red-500' }}">
                                    {{ number_format($row['tingkat_okupansi'], 2, ',', '.') }}%
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- Total Keseluruhan --}}
                    {{-- PERBAIKAN 2: Tambahkan kelas untuk dark mode --}}
                    <tfoot class="font-semibold text-gray-900 bg-gray-100 dark:text-white dark:bg-gray-700">
                        <tr>
                            <th scope="row" class="px-6 py-3 text-base">Total Keseluruhan</th>
                            <td class="px-6 py-3 text-right">
                                {{ number_format($totals['jumlah_penonton'], 0, ',', '.') }}</td>
                            <td class="px-6 py-3 text-right">
                                {{ number_format($totals['pendapatan_tiket'], 0, ',', '.') }}</td>
                            <td class="px-6 py-3 text-right">
                                {{ number_format($totals['harga_tiket_rata_rata'] ?? 0, 0, ',', '.') }}</td>
                            <td class="px-6 py-3 text-right">
                                {{ number_format($totals['total_sesi_tayang'], 0, ',', '.') }}</td>
                            <td class="px-6 py-3 text-right">
                                {{ number_format($totals['rata_rata_penonton_per_sesi'] ?? 0, 1, ',', '.') }}</td>
                            <td
                                class="px-6 py-3 text-right font-medium {{ ($totals['tingkat_okupansi'] ?? 0) > 50 ? 'text-green-500' : 'text-red-500' }}">
                                {{ number_format($totals['tingkat_okupansi'] ?? 0, 2, ',', '.') }}%
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @else
            {{-- PERBAIKAN 1: Tampilan jika tidak ada data --}}
            <div class="flex items-center justify-center h-48 text-center">
                <div>
                    <div class="flex justify-center mb-4">
                        <x-heroicon-o-x-circle class="w-8 h-8 text-gray-400" />
                    </div>
                    <p class="text-lg font-medium text-gray-600 dark:text-gray-400">
                        Tidak ada data untuk rentang tanggal yang dipilih.
                    </p>
                </div>
            </div>
        @endif
    </x-filament::card>
</x-filament-panels::page>
