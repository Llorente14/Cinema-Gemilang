<div class="group/card-carousell relative  h-[22.5vw]  w-[15vw] snap-start shrink-0 cursor-pointer "
    id="wrapper-card-carousell">
    <div class="pt-[150%] " id="padding-card-carousell"></div>
    <div
        class="group/content absolute w-full h-[22.5vw] top-0 left-0  bg-transparent backdrop-blur-[1vw] hover:card-hover  not-hover:animate-notPick">
        <div class="relative" id="wrapper-info">
            <div class="relative pt-[150%] w-full ">

                <img class="absolute top-0 left-0 w-full h-full object-cover " src="{{ $imageUrl }}" alt=""
                    srcset="">

            </div>
            {{-- Hover Content --}}
            <div class=" absolute bottom-0 left-0 opacity-0  flex flex-col items-center card-vignette w-full h-[80%] px-[1.1vw] z-[2] py-[2vw] cursor-default group-hover/content:animate-showContent "
                id="card-content">
                <div class=" flex flex-col absolute items-center px-[0.1vw] -bottom-[3vw] top-[3vw]   "
                    id="card-content-wrapper">
                    {{-- Jika film belum rilis (Conditional) --}}
                    @if ($realiseDate)
                        <p class="text-primary mb-2 font-semibold tracking-wide text-[1vw]">{{ $realiseDate }}</p>
                    @else
                        <p class="text-primary mb-2 font-semibold tracking-wide text-[1vw] opacity-0">
                            7 Agustus</p>
                    @endif
                    {{-- Button --}}
                    <div class="relative flex max-w-full flex-col items-center justify-center gap-[0.5vw]">
                        <livewire:card-button href="https://youtu.be/hnfF9tgN8OI?si=IlVYG_5Ipds1N2SA"
                            text="Putar Trailer" icon="play" bg="bg-white/40 text-dark" hover="hover:bg-white/30" />
                        <livewire:card-button href="/movies" text="Beli Tiket" icon="ticket" bg="bg-dark text-white/90"
                            hover="hover:bg-dark/90" />
                    </div>
                    {{-- Info Age and Duration --}}
                    <livewire:info-movie class="text-[0.75vw]" age="{{ $age }}"
                        duration="{{ $duration }}"></livewire:info-movie>
                </div>
            </div>
        </div>
        {{-- Fixed This Bug --}}
        <a href="/movies/1" class="w-full h-full absolute top-0 left-0 z-[1]"></a>
        {{-- Bottom Card --}}
        <div
            class=" opacity-100 flex flex-col max-h-max text-center mt-[0.5vw] mx-[1vw] gap-[0.5vw] group-hover/content:animate-showUp group-[&:not(:hover)]/content:animate-showDown  ">
            <h4 class="text-dark text-[1.2vw] line-clamp-1 tracking-wide font-semibold">{{ $title }}
            </h4>
            <div class="flex justify-center">
                <p class="text-dark/90 text-[0.6vw] pb-[1vw]">CINEMA GEMILANG</p>
            </div>
        </div>
    </div>
</div>
