<div class="flex w-full bg-dark transition-colors duration-500 ease-in-out pt-[6.25vw] justify-center ">


    <div class="flex flex-col w-[77vw] py-[2vw] gap-[2vw]">
        <livewire:components.bread-crumbs />
        <div class="flex flex-col flex-start gap-[1.5vw]">
            {{-- Title --}}
            <div class="text-light font-bold tracking-wide text-[2vw] text-start">
                <p>{{ $msg }}</p>
            </div>
            {{-- Fitur Sorting --}}
            <div class="flex justify-between items-center">
                <ul class="flex gap-[1vw]" id="btn-placeholder">

                    <li wire:click='sortByStatus' class="w-max btnLi">

                        <livewire:components.secondary-button style="none-light" icon="none" text="Lagi tayang"
                            size="sm" />
                    </li>


                    <li wire:click='sortByStatus' class="w-max btnLi">
                        <livewire:components.secondary-button style="none-dark" icon="none" text="Akan tayang"
                            size="sm" />
                    </li>
                </ul>
            </div>
            {{-- Gallery with grid view --}}

            <div
                class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-[2.1vw] pt-[0.5vw] justify-items-center max-w-full">
                <livewire:components.gallery-card />
                <livewire:components.gallery-card />
                <livewire:components.gallery-card />
                <livewire:components.gallery-card />
                <livewire:components.gallery-card />
                <livewire:components.gallery-card />
                <livewire:components.gallery-card />


            </div>
            {{-- Gallery with list view --}}
        </div>
    </div>
</div>
