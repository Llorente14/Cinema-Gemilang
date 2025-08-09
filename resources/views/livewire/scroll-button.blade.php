@php
    $isLeft = $direction === 'left';
@endphp

<button x-data
    x-on:click="
        const container = document.getElementById('{{ $target }}');
        if (container) {
            container.scrollBy({
                left: {{ $isLeft ? '-' : '' }}300,
                behavior: 'smooth'
            });
        }
    "
    class="absolute top-[50%] {{ $isLeft ? 'left-0' : 'right-0' }} opacity-0 z-10 flex items-center justify-center text-center p-2 btn-pagination bg-light fill-dark rounded-full cursor-pointer">
    <svg class="size-[1.2vw]" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="1.2">
        <path
            d="{{ $isLeft
                ? 'M16.1795 3.26875C15.7889 2.87823 15.1558 2.87823 14.7652 3.26875L8.12078 9.91322C6.94952 11.0845 6.94916 12.9833 8.11996 14.155L14.6903 20.7304C15.0808 21.121 15.714 21.121 16.1045 20.7304C16.495 20.3399 16.495 19.7067 16.1045 19.3162L9.53246 12.7442C9.14194 12.3536 9.14194 11.7205 9.53246 11.33L16.1795 4.68297C16.57 4.29244 16.57 3.65928 16.1795 3.26875Z'
                : 'M7.82047 20.7313C8.21101 21.1218 8.84414 21.1218 9.23467 20.7313L15.8791 14.0868C17.0504 12.9155 17.0508 11.0167 15.88 9.84495L9.30965 3.26961C8.91912 2.87908 8.28596 2.87908 7.89543 3.26961C7.5049 3.66014 7.5049 4.2933 7.89543 4.68383L14.4674 11.2558C14.8579 11.6464 14.8579 12.2795 14.4674 12.67L7.82047 19.317C7.42994 19.7076 7.42994 20.3407 7.82047 20.7313Z' }}" />
    </svg>
</button>

{{-- Trash Code --}}
{{-- <div
             class=" absolute top-[50%] left-0 opacity-0 flex text-center p-2 btn-pagination bg-white fill-dark rounded-full">
             <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-[1.2vw]"
                 transform="matrix(1, 0, 0, 1, 0, 0)" stroke-width="1.2">
                 <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                 <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                 <g id="SVGRepo_iconCarrier">
                     <path
                         d="M16.1795 3.26875C15.7889 2.87823 15.1558 2.87823 14.7652 3.26875L8.12078 9.91322C6.94952 11.0845 6.94916 12.9833 8.11996 14.155L14.6903 20.7304C15.0808 21.121 15.714 21.121 16.1045 20.7304C16.495 20.3399 16.495 19.7067 16.1045 19.3162L9.53246 12.7442C9.14194 12.3536 9.14194 11.7205 9.53246 11.33L16.1795 4.68297C16.57 4.29244 16.57 3.65928 16.1795 3.26875Z">
                     </path>
                 </g>
             </svg>
         </div> --}}
{{-- <div
             class=" absolute top-[50%] right-0 opacity-0 flex text-center p-2 btn-pagination bg-white/80 fill-dark rounded-full">
             <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-[1.2vw]"
                 transform="matrix(-1, 0, 0, 1, 0, 0) "stroke-width="1.2">
                 <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                 <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                 <g id="SVGRepo_iconCarrier">
                     <path
                         d="M16.1795 3.26875C15.7889 2.87823 15.1558 2.87823 14.7652 3.26875L8.12078 9.91322C6.94952 11.0845 6.94916 12.9833 8.11996 14.155L14.6903 20.7304C15.0808 21.121 15.714 21.121 16.1045 20.7304C16.495 20.3399 16.495 19.7067 16.1045 19.3162L9.53246 12.7442C9.14194 12.3536 9.14194 11.7205 9.53246 11.33L16.1795 4.68297C16.57 4.29244 16.57 3.65928 16.1795 3.26875Z">
                     </path>
                 </g>
             </svg>

         </div> --}}
