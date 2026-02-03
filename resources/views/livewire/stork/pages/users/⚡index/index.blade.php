<div>
    {{-- Categories Heading --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold dark:text-slate-100 text-zinc-900">
            Users
        </h1>
        {{-- <p class="mt-1 text-sm dark:text-slate-400 text-zinc-600">Manage your categories</p> --}}
    </div>


    {{-- Filters --}}
    <div class="mb-6 bg-white  rounded-lg border border-zinc-200 p-4">
        <div class="flex flex-col sm:flex-row gap-4 items-center">
            {{-- Search Input --}}
            <div class="flex-1">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search Categries ... "
                    class="w-full rounded-md border-zinc-300 shadow-sm  text-zinc-500 focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="sm:w-48">
                {{-- <label for="" class='text-zinc-900 '>Status</label>
                <input type="radio"> --}}
            </div>
            @can('create users')
                <div class="">
                    <a href="{{ route('users.create') }}"
                        class="inline-flex items-center px-4 py-2 gap-1 text-white font-bold text-sm tracking-wide bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-400 border rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        {{ __('messages.create') }}

                    </a>
                </div>
            @endcan
        </div>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="mb-6 bg-green-100 border border-green-200 rounded-lg p-4" wire:transition>
            <p class='text-sm text-green-800'>{{ session('success') }}</p>
        </div>
    @endif


    {{-- Categories Table --}}

    <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50 ">
                    <tr>
                        <th class='px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider'>
                            Name
                        </th>

                        <th class='px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider'>
                            Email
                        </th>

                        <th class='px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider'>
                            Status
                        </th>
                        <th class='px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider'>
                            Actions
                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @forelse ($users as $user)
                        <tr wire:key="category-{{ $category->id }}" wire:transition class="hover:bg-slate-50">
                            <td class='px-6 py-4 whitespace-nowrap'>
                                <div class="text-sm font-medium text-zinc-900">
                                    {{ $category->name }}
                                </div>
                            </td>
                            <td class='px-6 py-4 whitespace-nowrap'>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 ">
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ asset('storage/' . $category->image) }}" alt="Preview Image">
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 py-0.5 inline-flex text-sm leading-5 font-semibold rounded-full {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $category->is_active ? 'Active' : 'In Active' }}
                                </span>
                            </td class='px-6 py-4'>

                            <td colspan="1" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-start gap-2">
                                    {{-- Edit --}}
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </a>
                                    {{-- Delete --}}
                                    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                                        class="relative z-50 w-auto h-auto">
                                        <button @click="modalOpen=true" class='text-red-600 hover:text-red-900'>
                                            Delete
                                        </button>
                                        {{-- Alert Modal --}}
                                        <template x-teleport="body">
                                            <div x-show="modalOpen"
                                                class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                                x-cloak>
                                                <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in duration-300"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                                    class="absolute inset-0 w-full h-full bg-black/40">
                                                </div>
                                                <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                                    x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                    class="relative px-7 py-6 w-full bg-white sm:max-w-lg sm:rounded-lg">
                                                    <div class="flex justify-between items-center pb-2">
                                                        <h3 class="text-lg font-semibold text-zinc-900">Category</h3>
                                                        <button @click="modalOpen=false"
                                                            class="flex absolute top-0 right-0 justify-center items-center mt-5 mr-5 w-8 h-8 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="relative w-auto">
                                                        <p class="text-zinc-700">
                                                            Do you want to delete your {{ $category->name }} ?
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                                        <button @click="modalOpen=false" type="button"
                                                            class="inline-flex justify-center items-center text-zinc-900 px-4 py-2 h-10 text-sm font-medium rounded-md border transition-colors  hover:bg-zinc-200 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:ring-offset-2">Cancel</button>
                                                        <button type="button"
                                                            @click="$dispatch('delete',{category: {{ $category->id }}})"
                                                            class="inline-flex justify-center items-center px-4 py-2 h-10 text-sm font-medium text-red-800 rounded-md border border-transparent transition-colors focus:outline-none focus:ring-2 focus:ring-red-100 focus:ring-offset-2 bg-red-100 hover:bg-red-200">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 text-center text-slate-400"> No Category Found.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>



    {{-- pagination --}}


    <div class="mt-6">
        {{ $users->links('vendor.pagination.tailwind') }}
    </div>









</div>
