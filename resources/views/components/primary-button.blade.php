<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-primary text-white text-base p-3 font-bold rounded-full']) }}>
    {{ $slot }}
</button>
