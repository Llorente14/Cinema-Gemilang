<div class="text-[1vw]  cursor-pointer  tracking-wide  ">
    <a href="{{ $href }}"
        class="{{ $active ? 'font-bold text-primary hover:text-primary/80' : 'text-white   hover:text-white/80' }}"
        wire:navigate>
        {{ $label }}
    </a>
</div>
