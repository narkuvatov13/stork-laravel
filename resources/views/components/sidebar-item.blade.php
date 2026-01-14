{{-- @props(['class' => '']) --}}
<div>
    <div
        {{ $attributes->merge(['class' => 'cursor-pointer p-4 text-white text-base font-normal transition-colors bg-zinc-800 hover:bg-zinc-700 ']) }}>

        {{ $slot }}
    </div>
</div>
