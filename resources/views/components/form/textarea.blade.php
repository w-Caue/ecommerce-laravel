@aware(['error'])

@props(['value', 'name', 'for', 'title'])


<textarea rows="2"
    {{ $attributes->class([
        'block p-2 font-bold text-neutral-700 w-full focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input rounded-lg border border-neutral-300',
        'border-red-500' => $error,
    ]) }}
    @isset($name) name="{{ $name }}" @endif
        type="text"
        @isset($value) value="{{ $value }}" @endif
    {{ $attributes }}> 
</textarea>
