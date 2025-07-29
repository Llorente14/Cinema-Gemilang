 <section class="w-full flex justify-center relative px-[clamp(1rem,4vw,6rem)] ">
     <div class=" flex flex-col w-[77vw]     ">
         <div class="flex justify-between w-[61.5vw] mb-2">
             <p class="text-white/95 text-[1.4vw] font-[600] tracking-wide">Film segera tayang</p>
         </div>
         <div class="w-[77vw] pt-[4vw] snap-mandatory snap-x scroll-smooth overflow-x-scroll overflow-y-clip ">


             <div class=" flex items-center   gap-[0.5vw]   accent-accent z-40 max-h-full" id="container-film">

                 <div class="group/card-carousell relative h-[22.5vw] w-[15vw] snap-start shrink-0 "
                     id="wrapper-card-carousell">
                     <div class="pt-[200%] " id="padding-card-carousell"></div>
                     <div
                         class=" absolute w-full h-full top-0 left-0 cursor-pointer hover:card-hover  not-hover:animate-notPick">
                         <div class="relative" id="wrapper-info">
                             <div class="relative pt-[150%] w-full ">
                                 <img class="absolute top-0 left-0 w-full h-full" src="images/TestCard.jpg"
                                     alt="" srcset="">

                             </div>
                             <div class="absolute bottom-0 left-0 flex flex-col items-center card-vignette w-full h-[80%] px-[1.1vw] py-[2vw]"
                                 id="card-content">
                                 <div class="flex flex-col absolute items-center px-[0.1vw] -bottom-[3vw] top-[3vw] z-[2]"
                                     id="card-content-wrapper">
                                     {{-- Jika film belum rilis (Conditional) --}}
                                     <p class="text-primary mb-2 font-semibold tracking-wide text-[1vw]">Tayang 7
                                         Agustus</p>
                                     {{-- Button --}}
                                     <div class="flex max-w-full flex-col items-center justify-center gap-[0.5vw] ">
                                         <button
                                             class="bg-white/40 text-dark text-[0.8vw] w-[10vw] px-[55%] py-[7%] font-semibold rounded-full cursor-pointer flex gap-2 items-center justify-center border-2 border-dark border-solid whitespace-nowrap hover:bg-white/30">
                                             <div class="size-[1vw] fill-dark">
                                                 <svg class="size-[1vw]" viewBox="0 0 7.00 7.00" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                         stroke-linejoin="round" stroke="#CCCCCC"
                                                         stroke-width="0.014000000000000002"></g>
                                                     <g id="SVGRepo_iconCarrier">
                                                         <title>play [#1003]</title>
                                                         <desc>Created with Sketch.</desc>
                                                         <defs> </defs>
                                                         <g id="Page-1" stroke="none" stroke-width="1"
                                                             fill-rule="evenodd">
                                                             <g id="Dribbble-Light-Preview"
                                                                 transform="translate(-347.000000, -3766.000000)">
                                                                 <g id="icons"
                                                                     transform="translate(56.000000, 160.000000)">
                                                                     <path
                                                                         d="M296.494737,3608.57322 L292.500752,3606.14219 C291.83208,3605.73542 291,3606.25002 291,3607.06891 L291,3611.93095 C291,3612.7509 291.83208,3613.26444 292.500752,3612.85767 L296.494737,3610.42771 C297.168421,3610.01774 297.168421,3608.98319 296.494737,3608.57322"
                                                                         id="play-[#1003]"> </path>
                                                                 </g>
                                                             </g>
                                                         </g>
                                                     </g>
                                                 </svg>
                                             </div>
                                             <p>

                                                 Putar Trailer
                                             </p>
                                         </button>
                                         <button
                                             class="bg-dark text-white/90 text-[0.8vw] w-[10vw] px-[55%] py-[7%] font-semibold rounded-full cursor-pointer flex gap-2 items-center justify-center border-2 border-dark border-solid whitespace-nowrap hover:bg-dark/90">
                                             <div class="size-[1.2vw] fill-white">
                                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                     class="size-[1.2vw]" viewBox="0 0 24 24" stroke-width="1.5"
                                                     stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round"
                                                         d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                                 </svg>

                                             </div>
                                             <p>
                                                 Beli Tiket
                                             </p>
                                         </button>


                                     </div>
                                     {{-- Info Age and Duration --}}
                                     <div class="flex max-w-full items-center justify-center gap-[0.5vw] mt-[1.2vw]">
                                         {{-- Age Restrictions --}}
                                         <p class="px-[0.2vw] text-[0.75vw] tracking-wide bg-neutral/10 text-dark">
                                             R13
                                         </p>
                                         {{-- Duration --}}
                                         <p class="px-[0.2vw] text-[0.75vw] tracking-wide bg-neutral/10 text-dark">
                                             1h 34m
                                         </p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="group/card-carousell relative h-[22.5vw] w-[15vw] snap-start shrink-0 "
                     id="wrapper-card-carousell">
                     <div class="pt-[150%] relative" id="padding-card-carousell"></div>
                     <div
                         class=" absolute w-full h-full top-0 left-0  bg-blue-500 hover:card-hover not-hover:animate-notPick ">
                     </div>
                 </div>
                 <div class="group/card-carousell relative h-[22.5vw] w-[15vw] snap-start shrink-0 "
                     id="wrapper-card-carousell">
                     <div class="pt-[150%] relative" id="padding-card-carousell"></div>
                     <div
                         class=" absolute w-full h-full top-0 left-0  bg-blue-500 hover:card-hover not-hover:animate-notPick ">
                     </div>
                 </div>
                 <div class="group/card-carousell relative h-[22.5vw] w-[15vw] snap-start shrink-0 "
                     id="wrapper-card-carousell">
                     <div class="pt-[150%] relative" id="padding-card-carousell"></div>
                     <div
                         class=" absolute w-full h-full top-0 left-0  bg-blue-500 hover:card-hover not-hover:animate-notPick ">
                     </div>
                 </div>
                 <div class="group/card-carousell relative h-[22.5vw] w-[15vw] snap-start shrink-0 "
                     id="wrapper-card-carousell">
                     <div class="pt-[150%] relative" id="padding-card-carousell"></div>
                     <div
                         class=" absolute w-full h-full top-0 left-0  bg-blue-500 hover:card-hover not-hover:animate-notPick ">
                     </div>
                 </div>
                 <div class="group/card-carousell relative h-[22.5vw] w-[15vw] snap-start shrink-0 "
                     id="wrapper-card-carousell">
                     <div class="pt-[150%] relative" id="padding-card-carousell"></div>
                     <div
                         class=" absolute w-full h-full top-0 left-0  bg-blue-500 hover:card-hover not-hover:animate-notPick ">
                     </div>
                 </div>
                 <div class="group/card-carousell relative h-[22.5vw] w-[15vw] snap-start shrink-0 "
                     id="wrapper-card-carousell">
                     <div class="pt-[150%] relative" id="padding-card-carousell"></div>
                     <div
                         class=" absolute w-full h-full top-0 left-0  bg-blue-500 hover:card-hover not-hover:animate-notPick ">
                     </div>
                 </div>
                 <div class="group/card-carousell relative h-[22.5vw] w-[15vw] snap-start shrink-0 "
                     id="wrapper-card-carousell">
                     <div class="pt-[150%] relative" id="padding-card-carousell"></div>
                     <div
                         class=" absolute w-full h-full top-0 left-0  bg-blue-500 hover:card-hover not-hover:animate-notPick">
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
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
