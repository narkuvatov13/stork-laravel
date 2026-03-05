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
        <div class="flex flex-col">
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
                                        class="text-zinc-800 dark:text-white bg-white hover:bg-zinc-50 dark:bg-white/5 dark:hover:bg-white/10 cursor-pointer">

                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                            {{ $category->name }}</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap"><img
                                                class="h-10 w-10 rounded-full"
                                                src="{{ asset('storage/' . $category->image) }}" alt="Preview Image">
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap"><span
                                                class="px-2 py-0.5 inline-flex text-sm leading-5 font-semibold rounded-full {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $category->is_active ? 'Active' : 'In Active' }}
                                            </span></td>

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
                                                    <flux:link href="#" variant="ghost"
                                                        class="text-red-600 dark:text-red-400">Delete
                                                    </flux:link>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-6 text-center text-slate-400"> No Category
                                            Found.</td>
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

        <div class=" px-5 py-3 ">
            {{ $categories->links('vendor.pagination.tailwind') }}
        </div>


    </div>


    {{-- pagination --}}


</div>
