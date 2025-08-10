@aware(['error'])

@props(['for', 'value'])

<span for="{{ $for ?? '' }}"
    {{ $attributes->merge([
        'class' => 'text-sm font-bold text-neutral-600',
        'text-red-500' => $error, //condição, caso true, mostra text-red-500
    ]) }}>{{ $value }}
</span>
