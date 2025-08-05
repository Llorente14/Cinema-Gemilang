 <a href="{{ $href }}" target="_blank" rel="noreferrer"
     class="{{ $bg }} {{ $border }} {{ $hover }} border-2 border-solid text-[0.8vw] w-[10vw] px-[55%] py-[7%] font-semibold rounded-full flex gap-2  items-center justify-center  whitespace-nowrap  transition-colors duration-300 ">

     <div class="size-[1.2vw] ">
         @switch($icon)
             @case('play')
                 {{-- Icon Play --}}
                 <svg viewBox="0 0 7.00 7.00" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" stroke="currentColor">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="0.014000000000000002"></g>
                     <g id="SVGRepo_iconCarrier">
                         <title>play [#1003]</title>
                         <desc>Created with Sketch.</desc>
                         <defs> </defs>
                         <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd">
                             <g id="Dribbble-Light-Preview" transform="translate(-347.000000, -3766.000000)">
                                 <g id="icons" transform="translate(56.000000, 160.000000)">
                                     <path
                                         d="M296.494737,3608.57322 L292.500752,3606.14219 C291.83208,3605.73542 291,3606.25002 291,3607.06891 L291,3611.93095 C291,3612.7509 291.83208,3613.26444 292.500752,3612.85767 L296.494737,3610.42771 C297.168421,3610.01774 297.168421,3608.98319 296.494737,3608.57322"
                                         id="play-[#1003]"> </path>
                                 </g>
                             </g>
                         </g>
                     </g>
                 </svg>
             @break

             @case('ticket')
                 <svg class="size-[1.2vw]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                 </svg>
             @break
         @endswitch
     </div>

     <p>{{ $text }}</p>
 </a>

 {{-- Trash Code --}}
 {{-- <a href="https://youtu.be/hnfF9tgN8OI?si=IlVYG_5Ipds1N2SA" no-referrer target="_blank"
     class="bg-white/40 text-dark text-[0.8vw] w-[10vw] px-[55%] py-[7%] font-semibold rounded-full  flex gap-2 items-center justify-center border-2 border-dark border-solid whitespace-nowrap hover:bg-white/30 ">
     <div class="size-[1vw] fill-dark">
         <svg class="size-[1vw]" viewBox="0 0 7.00 7.00" version="1.1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink">
             <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
             <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC"
                 stroke-width="0.014000000000000002"></g>
             <g id="SVGRepo_iconCarrier">

                 <defs> </defs>
                 <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd">
                     <g id="Dribbble-Light-Preview" transform="translate(-347.000000, -3766.000000)">
                         <g id="icons" transform="translate(56.000000, 160.000000)">
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
 </a href="/trailer"> --}}
