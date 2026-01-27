<div>
    {{-- Categories Heading --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold dark:text-slate-100 text-zinc-900"> Categories</h1>
        <p class="mt-1 text-sm dark:text-slate-400 text-zinc-600">Manage your categories</p>
    </div>
    {{-- Filters --}}
    <div class="mb-6 dark:bg-white rounded-lg border border-zinc-200 p-4">
        <div class="flex flex-col sm:flex-row gap-4 items-center">
            <div class="flex-1">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search Categries ... "
                    class="w-full rounded-md border-zinc-300 shadow-sm  focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="sm:w-48">
                {{-- <label for="" class='text-zinc-900 '>Status</label>
                <input type="radio"> --}}
            </div>
            @can('create categories')
                <div class="">
                    <a href="{{ route('categories.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        {{ __('messages.new_category') }}

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
                            Status
                        </th>
                        <th class='px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider'>
                            Actions
                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @forelse ($categories as $category)
                        <tr wire:key="category-{{ $category->id }}" wire:transition class="hover:bg-slate-50">
                            <td class='px-6 py-4 whitespace-nowrap'>
                                <div class="text-sm font-medium text-zinc-900">
                                    {{ $category->name }}
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
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </a>
                                    <button wire:click='deleteCategory({{ $category->id }})'
                                        wire:confirm=' Are you sure you want to delete this category?'
                                        class='text-red-600 hover:text-red-900'>
                                        Delete
                                    </button>
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
        {{ $categories->links() }}
    </div>
</div>
