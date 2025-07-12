<x-filament-panels::page>
    <form wire:submit="tampilkanLaporan" class="mb-6">
        {{ $this->form }}
        <div class="mt-4">
            <x-filament::button type="submit">
                Tampilkan Laporan
            </x-filament::button>
        </div>
    </form>

    @if($records->isNotEmpty())
        <div class="flex justify-end mb-4">
            <x-filament::button wire:click="unduhPdf" icon="heroicon-o-arrow-down-tray">
                Unduh PDF
            </x-filament::button>
        </div>

        <div class="space-y-4">
            @foreach ($records as $record)
                <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 border dark:border-gray-700">
                    <div class="flex justify-between">
                        <span class="font-bold text-lg text-gray-800 dark:text-white">#{{ $record->booking_code }}</span>
                        <span class="font-bold text-lg text-gray-800 dark:text-white">Rp {{ number_format($record->total_price) }}</span>
                    </div>
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                        <p>Pemesan: {{ $record->user->name }}</p>
                        <p>Film: {{ $record->showtime->movie->title }}</p>
                        <p>Tanggal Pesan: {{ $record->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-filament-panels::page>