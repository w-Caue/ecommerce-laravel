<span class="w-4 h-4 ml-1">

    @if ($sortField !== $field)
        {{-- <x-icons.search class="size-4" />   --}}
    @else
        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-search-icon lucide-search">
            <path d="m21 21-4.34-4.34" />
            <circle cx="11" cy="11" r="8" />
        </svg>
    @endif
</span>
