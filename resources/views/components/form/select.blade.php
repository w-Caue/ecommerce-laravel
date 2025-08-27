@aware(['error'])

@props(['value', 'name', 'for'])

<select
    {{ $attributes->class([
        'text-neutral-700 font-black block p-2 text-sm w-full focus:border-neutral-400 focus:outline-none focus:shadow-outline-blue rounded-lg bg-white border border-neutral-300',
        'border-red-500' => $error,
    ]) }}
    @isset($name) name="{{ $name }}" @endif
    @isset($value) value="{{ $value }}" @endif
    {{ $attributes }}>
    {{ $slot }}
</select>
