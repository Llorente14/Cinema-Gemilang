<div
    class=" fixed flex  flex-wrap  lg:gap-[20px] h-16 dark:bg-neutral left-0 top-0  nav-vignette w-dvw  px-[clamp(1rem,4vw,6rem)] z-[1]">
    <div class="flex items-center justify-center grow  shrink max-w-[120px] ">
        <div class="aspect-square size-[4.5em]">
            <a href="/" wire:navigate>

                <img src="{{ asset('images/logo.svg') }}" alt="Logo">
            </a>
        </div>

    </div>
    {{-- Dekstop --}}
    <div class=" items-center grow-[5] gap-8 hidden lg:flex">
        <livewire:component.nav-link href="/" label="Beranda" />
        <livewire:component.nav-link href="/movies" label="Daftar Film" />
        <livewire:component.nav-link href="/myorder" label="Pesanan Saya" />

    </div>
    {{-- Tablet/Mobile --}}
    <div class=" items-center grow-[5] gap-8 flex lg:hidden">
        <livewire:component.nav-link href="/" label="Telusuri" />


    </div>

    <div class="flex justify-end grow-[4]  gap-4 max-w-[450px]  " id="navbar-end">
        {{-- Search Bar --}}
        <livewire:SearchBar>
            <div class="flex items-center justify-center fill-white/95" id="theme-btn">
                <label class="swap swap-rotate ">
                    <!-- this hidden checkbox controls the state -->
                    <input type="checkbox" x-model="isDarkMode" />

                    <!-- sun icon -->
                    <svg class="swap-off h-7 w-7 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                    </svg>

                    <!-- moon icon -->
                    <svg class="swap-on h-7 w-7 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                    </svg>
                </label>
            </div>

            {{-- Avatar Icon --}}
            <div class="flex items-center justify-center" id="avatar-btn">

                <div class="dropdown dropdown-hover dropdown-bottom dropdown-end ">

                    <div tabindex="0" role="button" class="avatar">
                        <div class="w-10 rounded">
                            <img src="https://img.daisyui.com/images/profile/demo/superperson@192.webp" />
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="dropdown-content z-1 menu menu-lg bg-base-200/60 w-56 [&_li>*]:rounded-none p-0 ">

                        <li>
                            <a>
                                <svg class=" h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.1213 1.7071C17.9497 0.535532 16.0503 0.53553 14.8787 1.7071L13.2929 3.29289L12.5858 4L1.58579 15C1.21071 15.3751 1 15.8838 1 16.4142V21C1 22.1046 1.89543 23 3 23H7.58579C8.11622 23 8.62493 22.7893 9 22.4142L20 11.4142L20.7071 10.7071L22.2929 9.12132C23.4645 7.94975 23.4645 6.05025 22.2929 4.87868L19.1213 1.7071ZM15.5858 7L14 5.41421L3 16.4142L3 19C3.26264 19 3.52272 19.0517 3.76537 19.1522C4.00802 19.2527 4.2285 19.4001 4.41421 19.5858C4.59993 19.7715 4.74725 19.992 4.84776 20.2346C4.94827 20.4773 5 20.7374 5 21L7.58579 21L18.5858 10L17 8.41421L6.70711 18.7071L5.29289 17.2929L15.5858 7ZM16.2929 3.12132C16.6834 2.73079 17.3166 2.73079 17.7071 3.12132L20.8787 6.29289C21.2692 6.68341 21.2692 7.31658 20.8787 7.7071L20 8.58578L15.4142 4L16.2929 3.12132Z"
                                        fill="currentColor"></path>
                                </svg>
                                <p class="text-base">Edit Profile</p>
                            </a>
                        </li>
                        <li>
                            <a class="flex justify-start gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                                <p class="text-base">Pengaturan Akun</p>
                            </a>
                        </li>

                        <button class="py-2 border-t-2 border-base-content dark:hover:bg-base-100 ">

                            <p class=" text-base hover:underline cursor-pointer">Sign Out</p>
                        </button>

                    </ul>
                </div>
            </div>
    </div>

</div>
