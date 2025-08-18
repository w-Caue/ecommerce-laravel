@aware(['error'])

@props(['title', 'subtitle', 'color', 'url'])

<div {{ $attributes->merge(['class' => 'flex items-center p-4 bg-white rounded-2xl border border-neutral-200 cursor-pointer transition-all hover:scale-95']) }}>
    
    {{ $slot }}
    <div>
        @isset($title)
            <p class="mb-2 text-xs uppercase font-bold text-neutral-600">
                {{ $title }}
            </p>
        @endisset
        @isset($subtitle)
            <p class="text-md text-center font-bold">
                {{ $subtitle }}
            </p>
        @endisset
    </div>
</div>