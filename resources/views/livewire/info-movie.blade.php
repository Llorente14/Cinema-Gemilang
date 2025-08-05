 @props(['class' => ''])
 {{-- text-0.75vw = card Content --}}
 <div class="flex max-w-full items-center justify-center gap-[0.5vw] mt-[1.2vw] {{ $class }} ">
     {{-- Age Restrictions --}}
     <p class="px-[0.2vw] tracking-wide bg-infoMovie/20 rounded-xs text-light">
         {{ $age }}
     </p>
     {{-- Duration --}}
     <p class="px-[0.2vw] tracking-wide bg-infoMovie/20 rounded-xs text-light">
         {{ $duration }}
     </p>
 </div>
