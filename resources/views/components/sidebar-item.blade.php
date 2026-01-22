{{-- @props(['class' => '']) --}}
<div>
    <a href={{ route($route) }}
        {{ $attributes->merge(['class' => ' block cursor-pointer p-4 text-white text-base font-normal transition-colors bg-zinc-800 hover:bg-zinc-700 rounded-md ']) }}>

        {{ $slot }}
    </a>
</div>
