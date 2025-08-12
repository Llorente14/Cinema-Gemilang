<a href="{{ $href }}" target="{{ $newTabTarget }}"rel="noreferrer"
    class="{{ $styleBtn }}  {{ $hoverBtn }} {{ $sizeBtn }} {{ $positionIcon }} group/secBtn flex font-semibold rounded-full gap-2 items-center justify-center whitespace-nowrap transition-colors duration-500 ease-in-out ">

    @if ($icon != 'none')
        <div class="w-full fill-current group-hover/secBtn:animate-rightEnter">
            @switch($icon)
                @case('play')
                    {{-- Icon Play --}}
                    <svg class="{{ $sizeIcon }}" viewBox="0 0 7.00 7.00" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC"
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

                @case('info')
                    {{-- Icon Info --}}
                    <svg class="{{ $sizeIcon }}" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.661 7.86213C10.4142 8.04749 10.25 8.31328 10.25 8.75C10.25 9.30228 9.80229 9.75 9.25 9.75C8.69772 9.75 8.25 9.30228 8.25 8.75C8.25 7.68672 8.70818 6.82751 9.46005 6.26288C10.1787 5.72317 11.0967 5.5 12 5.5C13.0779 5.5 13.987 5.82418 14.6436 6.44499C15.2951 7.06101 15.6046 7.88116 15.6531 8.7005C15.7483 10.3042 14.864 12.0687 13.2461 12.9932C13.099 13.0773 13.008 13.1462 12.9529 13.1958C13.0783 13.5886 12.9509 14.0345 12.6034 14.2974C12.163 14.6307 11.5359 14.5438 11.2026 14.1034C11.2026 14.1034 11.2031 14.1041 11.2016 14.1021L11.2005 14.1007C10.9606 13.778 10.865 13.355 10.9137 12.9585C10.9974 12.277 11.4727 11.7031 12.2539 11.2568C13.2157 10.7071 13.7065 9.65911 13.6567 8.8189C13.6328 8.41625 13.4898 8.10656 13.2695 7.89822C13.0542 7.69468 12.6721 7.5 12 7.5C11.3981 7.5 10.9411 7.65183 10.661 7.86213Z" />
                        <path
                            d="M12 18.5C12.8284 18.5 13.5 17.8284 13.5 17C13.5 16.1716 12.8284 15.5 12 15.5C11.1716 15.5 10.5 16.1716 10.5 17C10.5 17.8284 11.1716 18.5 12 18.5Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3Z" />
                    </svg>
                @break

                @case('arrow-l')
                    <svg class="{{ $sizeIcon }}" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="1.2">
                        <path
                            d="M16.1795 3.26875C15.7889 2.87823 15.1558 2.87823 14.7652 3.26875L8.12078 9.91322C6.94952 11.0845 6.94916 12.9833 8.11996 14.155L14.6903 20.7304C15.0808 21.121 15.714 21.121 16.1045 20.7304C16.495 20.3399 16.495 19.7067 16.1045 19.3162L9.53246 12.7442C9.14194 12.3536 9.14194 11.7205 9.53246 11.33L16.1795 4.68297C16.57 4.29244 16.57 3.65928 16.1795 3.26875Z" />
                    </svg>
                @break

                @case('arrow-r')
                    <svg class="{{ $sizeIcon }}" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="1.2">
                        <path
                            d="M7.82047 20.7313C8.21101 21.1218 8.84414 21.1218 9.23467 20.7313L15.8791 14.0868C17.0504 12.9155 17.0508 11.0167 15.88 9.84495L9.30965 3.26961C8.91912 2.87908 8.28596 2.87908 7.89543 3.26961C7.5049 3.66014 7.5049 4.2933 7.89543 4.68383L14.4674 11.2558C14.8579 11.6464 14.8579 12.2795 14.4674 12.67L7.82047 19.317C7.42994 19.7076 7.42994 20.3407 7.82047 20.7313Z" />
                    </svg>
                @break
            @endswitch
        </div>
    @endif

    <p>{{ $text }}</p>
</a>
