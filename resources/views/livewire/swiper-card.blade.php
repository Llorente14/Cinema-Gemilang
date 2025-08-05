 <section class="w-full flex justify-center relative px-[clamp(1rem,4vw,6rem)]  ">
     <div class="relative flex flex-col justify-center items-center w-[77vw] px-10 grow swiper-card">
         <livewire:scroll-button direction="left" target="{{ $category }}" />
         <div class="flex justify-between items-center w-full px-[4.5vw] momo ">
             <p class="text-light/95 text-[1.4vw] font-[600] tracking-wide">{{ $category }}</p>
             <livewire:components.secondary-button style="cta" icon="arrow-r" positionIcon="right" text="Lihat Semua"
                 size="md">
         </div>
         <div class="w-[77vw] pt-[5vw] pb-[5vw] snap-mandatory snap-x scroll-smooth overflow-x-scroll overflow-y-clip scrollbar-hide card-container"
             id="{{ $category }}">


             <div class=" flex items-center   gap-[0.5vw]   accent-accent  max-h-full" id="container-film">
                 <livewire:carousell-card></livewire:carousell-card>
                 <livewire:carousell-card></livewire:carousell-card>
                 <livewire:carousell-card></livewire:carousell-card>
                 <livewire:carousell-card></livewire:carousell-card>
                 <livewire:carousell-card></livewire:carousell-card>
                 <livewire:carousell-card></livewire:carousell-card>
                 <livewire:carousell-card></livewire:carousell-card>
                 <livewire:carousell-card></livewire:carousell-card>
                 <livewire:carousell-card></livewire:carousell-card>
             </div>
         </div>
         <livewire:scroll-button direction="right" target="{{ $category }}" />
     </div>
 </section>


 {{-- Trash Code --}}
 {{-- <section class="w-full flex justify-center relative px-[clamp(1rem,4vw,6rem)]">
     <div class=" flex flex-col w-[77vw]  overflow-x-auto snap-mandatory snap-x scroll-smooth   ">
         <div class="flex justify-between w-[61.5vw] mb-2">
             <p class="text-white/95 text-[1.4vw] font-[600] tracking-wide">Film segera tayang</p>
         </div>
         <div class="w-[61.5vw] ">


             <div class=" flex items-center   gap-[0.5vw]   accent-accent z-40 max-h-full" id="container-film">
                 <div class=" h-[22.5vw] bg-blue-500 w-[15vw] relative snap-start shrink-0"></div>
                 <div class=" h-[22.5vw] bg-blue-500 w-[15vw] relative snap-start shrink-0 "></div>
                 <div class=" h-[22.5vw] bg-blue-500 w-[15vw] relative snap-start shrink-0 "></div>
                 <div class=" h-[22.5vw] bg-blue-500 w-[15vw] relative snap-start shrink-0 "></div>
                 <div class=" h-[22.5vw] bg-blue-500 w-[15vw] relative snap-start shrink-0 "></div>
                 <div class=" h-[22.5vw] bg-blue-500 w-[15vw] relative snap-start shrink-0 "></div>
                 <div class=" h-[22.5vw] bg-blue-500 w-[15vw] relative snap-start shrink-0 "></div>

             </div>
         </div>
     </div>
 </section> --}}
