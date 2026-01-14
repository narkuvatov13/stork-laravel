<div>

    <a href = "{{ route($route) }}"
        {{ $attributes->merge(['class' => 'block cursor-pointer p-4 text-white text-sm font-normal transition-colors bg-zinc-700 hover:bg-zinc-600 ']) }}>

        {{ $slot }}
    </a>
</div>
