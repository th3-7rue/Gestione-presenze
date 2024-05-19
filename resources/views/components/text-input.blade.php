@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'bg-[#f4f4f4] text-black border-none dark:bg-[#252525] dark:text-half-black focus:border-primary-light dark:focus:border-primary-light focus:ring-primary-light dark:focus:ring-primary-light rounded-md shadow-sm',
]) !!}>
