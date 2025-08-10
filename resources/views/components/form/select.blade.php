@aware(['error'])

@props(['value', 'name', 'for'])

<select
    {{ $attributes->class([
        'block p-2 text-xs uppercase w-full focus:border-neutral-500 focus:outline-none focus:shadow-outline-blue rounded-lg border border-neutral-400 dark:text-white dark:bg-gray-900 dark:border-gray-600',
        'border-red-500' => $error,
    ]) }}
    @isset($name) name="{{ $name }}" @endif
    @isset($value) value="{{ $value }}" @endif
    {{ $attributes }}>
    {{ $slot }}
</select>
