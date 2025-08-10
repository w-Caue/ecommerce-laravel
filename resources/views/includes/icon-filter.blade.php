<span class="size-5">

    @if ($sortField !== $field)
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevrons-up-down-icon lucide-chevrons-up-down">
            <path d="m7 15 5 5 5-5" />
            <path d="m7 9 5-5 5 5" />
        </svg>
    @elseif ($sortAsc)
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-up-icon lucide-chevrons-up">
            <path d="m17 11-5-5-5 5" />
            <path d="m17 18-5-5-5 5" />
        </svg>
    @else
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevrons-down-icon lucide-chevrons-down">
            <path d="m7 6 5 5 5-5" />
            <path d="m7 13 5 5 5-5" />
        </svg>
    @endif
</span>
