@props(['title'])

<div>
    <div x-data="{
        open: false
    }" :class="{ 'divide-y divide-green-600  transition-all': open == true }"
        class=" rounded-md ">
        <button @click="open=!open"
            {{ $attributes->merge(['class' => 'cursor-pointer  flex items-center justify-between w-full p-4 text-left select-none bg-zinc-800 hover:bg-zinc-700']) }}>
            <span>{{ $title }}</span>
            <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': open == true }" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </button>
        <div x-show="open" x-collapse x-cloak>
            <div class="">
                {{ $slot }}
            </div>
        </div>

    </div>
</div>
