<div class="text-[1vw] space-x-2 tracking-wide">
    <ul class="list-none flex space-x-[0.5vw] ">
        <li><a href="/" class="text-light/50 hover:text-light/60">Beranda</a></li>

        @foreach ($breadcrumbs as $index => $crumb)
            <li>/</li>
            <li>
                @if ($index === count($breadcrumbs) - 1)
                    {{-- Segmen terakhir: tidak bisa diklik --}}
                    <span class="font-semibold text-light cursor-default">{{ $crumb['title'] }}</span>
                @else
                    {{-- Segmen biasa: bisa diklik --}}
                    <a href="{{ $crumb['url'] }}" class="text-light/50 hover:text-light/60">
                        {{ $crumb['title'] }}
                    </a>
                @endif
            </li>
        @endforeach
    </ul>

</div>
