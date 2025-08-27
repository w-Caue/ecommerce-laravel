@aware(['error'])

@props(['value', 'name', 'for', 'title'])


<input
    {{ $attributes->class([
        'block p-2 text-sm font-bold text-neutral-700 w-full focus:border-neutral-400 focus:outline-none focus:shadow-outline-blue rounded-lg border border-neutral-300 dark:text-white dark:border-gray-600',
        'border-red-500' => $error,
    ]) }}
    @isset($name) name="{{ $name }}" @endif
        type="text"
        @isset($value) value="{{ $value }}" @endif
    {{ $attributes }} />
