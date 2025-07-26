<div class="relative flex items-center justify-end" x-data="{ isOpen: false }" @click.away="isOpen = false">

    <button @click="isOpen = !isOpen; if (isOpen) { $nextTick(() => $refs.searchInput.focus()) }"
        class="absolute right-4 z-10 transition-transform duration-300 ease-in-out"
        :class="{ '-translate-x-56': isOpen }">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white/95" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>

    <input type="text" x-ref="searchInput" @keydown.escape.window="isOpen = false" placeholder="Judul, Genre, Orang"
        class="absolute right-10 bg-transparent text-white/90 placeholder-white/80 outline-none border-b-2 transition-all duration-200 ease-in-out"
        :class="isOpen ? 'w-56 pl-8 pr-2 py-[3px]' : 'w-0 border-transparent'">
</div>
