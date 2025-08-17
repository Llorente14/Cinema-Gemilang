 <div class=" relative w-full  bg-gallery-card ">
     <div class="relative rounded-lg overflow-hidden  hover:g_card-vignette">

         <div class="relative pt-[147%] ">

             <img class="absolute left-0 top-0 object-cover rounded-lg " src="{{ $imageUrl }}" alt=""
                 srcset="">
         </div>
         <div class="absolute inset-0 w-full flex flex-col items-center justify-center gap-[0.8vw] gallery-filter">
             <livewire:card-button href="https://youtu.be/hnfF9tgN8OI?si=IlVYG_5Ipds1N2SA" text="Putar Trailer"
                 icon="none" bg="bg-transparent text-light" hover="hover:bg-gray-500/20"
                 size="text-[0.8vw] px-[25%] py-[0.6vw]" />
             <livewire:card-button href="/movies" text="Beli Tiket" icon="none"
                 size="text-[0.8vw] px-[27%] py-[0.7vw]" />
         </div>
     </div>
     <div class=" opacity-100 flex flex-col justify-start max-h-max mt-[0.5vw] mx-[1vw] gap-[0.5vw] ">
         <h4 class="text-light text-base line-clamp-1 tracking-wide font-semibold">{{ $title }}
         </h4>
         <livewire:info-movie class="text-[0.9vw]" age="{{ $age }}" duration="{{ $duration }}"
             position='start' size='md'></livewire:info-movie>
     </div>

 </div>
