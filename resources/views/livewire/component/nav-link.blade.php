<div class="text-xs  cursor-pointer  tracking-wide lg:text-sm">
    <a href="{{ $href }}"
        class="{{ $active ? 'font-bold text-primary hover:text-primary/80' : 'text-white   hover:text-white/80' }}"
        wire:navigate>
        {{ $label }}
    </a>
</div>
