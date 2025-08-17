 @props(['class' => ''])
 {{-- text-0.75vw = card Content --}}
 <div class="flex max-w-full items-center gap-[0.5vw] {{ $position }}  {{ $class }} ">
     {{-- Age Restrictions --}}
     <p class="{{ $size }} tracking-wide bg-infoMovie/20 rounded-xs text-light">
         {{ $age }}
     </p>
     {{-- Duration --}}
     <p class="{{ $size }} tracking-wide bg-infoMovie/20 rounded-xs text-light">
         {{ $duration }}
     </p>
 </div>
