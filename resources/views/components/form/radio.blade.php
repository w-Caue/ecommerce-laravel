@props(['disabled' => false])

<input type="radio" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        "relative float-left size-5 appearance-none rounded-full border-2 border-solid border-neutral-500 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] after:absolute after:z-[1] after:block after:size-4 after:rounded-full after:content-[''] checked:border-blue-500 checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-blue-500 checked:after:bg-blue-500 checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none   checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] rtl:float-right",
]) !!}>
