<div>
    {{-- Breadcrumbs --}}
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('categories.index') }}">Categories</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>List</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    {{-- Heading --}}
    <div class="mt-4 flex flex-col max-w-max  sm:max-w-full sm:flex-row sm:items-center sm:justify-between gap-4">
        <flux:heading size="xl">Categories</flux:heading>
        {{-- <flux:text>Manage your categories</flux:text> --}}
        @can('create categories')
            <flux:button href="{{ route('categories.create') }}" variant="primary" size="sm">New Category</flux:button>
        @endcan
    </div>


    {{-- Body --}}
    <div class="my-6  bg-white dark:bg-white/5  rounded-lg border border-zinc-200 dark:border-transparent ">

        {{-- Search --}}
        <div
            class="p-2  flex justify-end items-center gap-2 border border-b-zinc-200 dark:border-transparent rounded-tl-lg rounded-tr-lg ">

            <flux:input class="max-w-3/5 sm:max-w-2/5 transition-colors" class:input="focus:ring-2 focus:ring-accent "
                type="text" wire:model="search" variant="filled" placeholder="Search" icon="magnifying-glass"
                clearable>
            </flux:input>


            <div class="text-sm relative p-4">
                <flux:icon.funnel as="button" variant="solid"
                    class="text-zinc-600 hover:text-zinc-500  dark:text-zinc-500 dark:hover:text-zinc-600 cursor-pointer static transition-colors" />
                <span
                    class="rounded-full  px-1.5  dark:text-white text-xs font-body text-zinc-800   absolute top-0 right-0 border border-zinc-200 dark:border-transparent dark:bg-zinc-500">
                    0
                </span>

            </div>

        </div>
        {{-- Table --}}
        <div class="flex flex-col ">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-zinc-200">
                            <thead class="bg-zinc-50 dark:bg-zinc-900">
                                <th
                                    class="px-5 py-3 text-zinc-800 dark:text-white text-xs font-bold uppercase text-left">
                                    <div class="flex items-center gap-1">
                                        <span>Name</span>
                                        <flux:icon.chevron-down as="button" variant="mini" />
                                    </div>
                                </th>
                                <th
                                    class="px-5 py-3 text-zinc-800 dark:text-white text-xs font-bold uppercase text-left">
                                    <div class="flex items-center gap-1">
                                        <span>Image</span>
                                        <flux:icon.chevron-down as="button" variant="mini" />
                                    </div>
                                </th>
                                <th
                                    class="px-5 py-3 text-zinc-800 dark:text-white text-xs font-bold uppercase text-left">
                                    <div class="flex items-center gap-1">
                                        <span>Status</span>
                                        <flux:icon.chevron-down as="button" variant="mini" />
                                    </div>
                                </th>
                                <th
                                    class="px-5 py-3 text-zinc-800 dark:text-white text-xs font-bold uppercase text-left">
                                    {{-- <div class="flex items-center gap-1">
                                        <span>Action</span>
                                        <flux:icon.chevron-down as="button" variant="mini" />
                                    </div> --}}
                                </th>

                            </thead>
                            <tbody class="divide-y divide-zinc-200 dark:divide-white/10">
                                @forelse ($categories as $category)
                                    <tr wire:key="category-{{ $category->id }}" wire:transition
                                        class="text-zinc-800 dark:text-white bg-white hover:bg-zinc-50 dark:bg-white/5 dark:hover:bg-white/10 cursor-pointer border-green-500">

                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                            {{ $category->name }}</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap"><img
                                                class="h-10 w-10 rounded-full"
                                                src="{{ asset('storage/' . $category->image) }}" alt="Preview Image">
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">
                                            <span
                                                class="px-2 py-0.5 inline-flex text-sm leading-5 font-semibold rounded-full {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $category->is_active ? 'Active' : 'In Active' }}
                                            </span>
                                        </td>

                                        <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap ">
                                            <div class="flex items-center justify-end gap-2.5">
                                                <div class=" flex items-center justify-center gap-0.5">
                                                    <flux:icon.pencil-square variant="micro"
                                                        class="text-emerald-600 dark:text-emerald-400 " />
                                                    <flux:link href="{{ route('categories.edit', $category) }}"
                                                        variant="ghost" class="text-emerald-600 dark:text-emerald-400">
                                                        Edit
                                                    </flux:link>
                                                </div>
                                                <div class=" flex items-center justify-center gap-0.5 ">
                                                    <flux:icon.trash variant="micro"
                                                        class="text-red-600 dark:text-red-400 " />



                                                    <flux:link wire:click="deleteCategory({{ $category->id }})"
                                                        wire:confirm="Are you sure you want to delete this category?"
                                                        as="button" variant="ghost"
                                                        class="text-red-600 dark:text-red-400">
                                                        Delete
                                                    </flux:link>



                                                    <div x-data="{ modalOpen: false }"
                                                        @keydown.escape.window="modalOpen = false"
                                                        :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
                                                        <button @click="modalOpen=true"
                                                            class="inline-flex justify-center items-center px-4 py-2 h-10 text-sm font-medium bg-white rounded-md border transition-colors hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">Open</button>
                                                        <template x-teleport="body">
                                                            <div x-show="modalOpen"
                                                                class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                                                x-cloak>
                                                                {{-- Modal Backdrop --}}
                                                                <div x-show="modalOpen"
                                                                    x-transition:enter="ease-out duration-300"
                                                                    x-transition:enter-start="opacity-0"
                                                                    x-transition:enter-end="opacity-100"
                                                                    x-transition:leave="ease-in duration-300"
                                                                    x-transition:leave-start="opacity-100"
                                                                    x-transition:leave-end="opacity-0"
                                                                    @click="modalOpen=false"
                                                                    class="absolute inset-0 w-full h-full  bg-zinc-900/70 ">
                                                                </div>
                                                                {{-- Modal Card --}}
                                                                <div x-show="modalOpen"
                                                                    x-trap.inert.noscroll="modalOpen"
                                                                    x-transition:enter="ease-out duration-300"
                                                                    x-transition:enter-start="opacity-0 scale-90"
                                                                    x-transition:enter-end="opacity-100 scale-100"
                                                                    x-transition:leave="ease-in duration-200"
                                                                    x-transition:leave-start="opacity-100 scale-100"
                                                                    x-transition:leave-end="opacity-0 scale-90"
                                                                    class="relative px-7 py-6 w-full shadow-md drop-shadow-md  bg-white sm:max-w-lg sm:rounded-lg dark:bg-zinc-900 ">
                                                                    <div
                                                                        class="flex justify-between items-center pb-3 ">
                                                                        <h3 class="text-lg text-center font-semibold">

                                                                        </h3>
                                                                        <button @click="modalOpen=false"
                                                                            class="flex absolute top-0 right-0 justify-center items-center mt-5 mr-5 w-8 h-8 text-zinc-500 rounded-full hover:text-zinc-800 hover:bg-zinc-50 dark:bg-transparent dark:hover:bg-transparent dark:text-zinc-600 dark:hover:text-zinc-500">
                                                                            <svg class="w-5 h-5"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M6 18L18 6M6 6l12 12" />
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                    <div class="flex flex-col items-center ">
                                                                        {{-- Body Icon --}}
                                                                        <div
                                                                            class="flex items-center justify-center h-12 w-12 rounded-full bg-danger-medium dark:bg-danger/20">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class=" stroke-danger size-6"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor" class="size-6">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="relative w-auto mt-2">
                                                                            <p
                                                                                class=" text-zinc-800 dark:text-white text-lg font-medium">
                                                                                Delete {{ $category->name }}
                                                                            </p>
                                                                        </div>
                                                                        <p class="text-zinc-500 text-md ">
                                                                            Are you sure you would
                                                                            like to do this? </p>
                                                                        <div
                                                                            class="flex flex-row justify-around sm:space-x-2 mt-6">
                                                                            <button @click="modalOpen=false"
                                                                                type="button"
                                                                                class="inline-flex justify-center items-center px-4 py-2 h-10 text-sm font-medium text-zinc-800  rounded-md border border-zinc-200 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-zinc-200 focus:ring-offset-2 bg-white hover:bg-zinc-50 dark:text-white dark:bg-zinc-800 dark:hover:bg-zinc-700  dark:border-transparent">
                                                                                Cancel
                                                                            </button>
                                                                            <button @click="modalOpen=false"
                                                                                type="button"
                                                                                class="inline-flex justify-center items-center px-4 py-2 h-10 text-sm font-medium text-white rounded-md border border-transparent transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-red-600 hover:bg-red-500 ">
                                                                                Delete
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>


                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-6 text-center text-slate-400">
                                            No Category Found.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <flux:separator></flux:separator>
        {{-- Pagination --}}
        {{ $categories->links('vendor.pagination.tailwind') }}


    </div>


    {{-- pagination --}}


</div>
