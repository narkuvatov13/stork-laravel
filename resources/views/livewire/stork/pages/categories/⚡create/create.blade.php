<div>
    {{-- Categories Heading --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold dark:text-slate-100 text-zinc-900"> Categories</h1>
        <p class="mt-1 text-sm dark:text-slate-400 text-zinc-600">Manage your categories</p>
    </div>

    {{-- Category Form --}}

    <div class="bg-white  rounded-lg border border-slate-200 p-6">
        <form wire:submit.prevent="save" class='space-y-6'>
            {{-- Name --}}
            <div class="">
                <label for="name" class= 'block text-sm font-medium text-zinc-700'> Name </label>
                <input type="text" id='name' wire:model.live.debounce='name' placeholder='Enter Category Name'
                    autofocus
                    class='mt-1 block w-full rounded-md text-zinc-800 border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500'>
                @error('name')
                    <p class='mt-1 text-sm text-red-600'>{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div class="">
                <label class="block text-sm font-medium text-slate-700"> Image </label>
                <input type="file" wire:model='image' accept='image/*'
                    class='mt-1 block w-full text-sm text-slate-500 file:mr-4  file:py-2 file:px-4   file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100'>
                @error('image')
                    <p class='mt-1 text-sm text-red-600'>{{ $message }}</p>
                @enderror
            </div>
            @if ($image)
                <div class="mt-3" wire:transition>
                    <img src="{{ $image->temporaryUrl() }}" class="h-32 w-auto rounded border border-slate-300"
                        alt="Preview">
                </div>
            @endif

            <div wire:loading wire:target='image' class="mt-2 text-sm text-slate-500"> Uploading...</div>

            {{-- Status --}}

            <div class="">
                <label for="" class="block text-sm font-medium text-slate-700 mb-2"> Status </label>
                <div class="space-y-2">
                    <label class='flex items-start'>
                        <input type="radio" wire:model="is_active" name='is_active'
                            value='{{ \App\Enums\Status::ACTIVE }}'
                            class='mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-600 border-slate-300'>
                        <div class="ml-3">
                            <span class='block text-sm font-medium text-slate-700'>Active</span>
                        </div>
                    </label>
                    <label class='flex items-start'>
                        <input type="radio" wire:model="is_active" name='is_active'
                            value='{{ \App\Enums\Status::INACTIVE }}'
                            class='mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-600 border-slate-300'>
                        <div class="ml-3">
                            <span class='block text-sm font-medium text-slate-700'>InActive</span>
                        </div>
                    </label>
                </div>
                {{-- value='{{ $is_active ? \App\Enums\Status\Status::INACTIVE : \App\Enums\Status\Status::ACTIVE }}' --}}




                @error('status')
                    <p class='mt-1 text-sm text-red-600'>{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}

            <div class="flex gap-3">
                <button type="submit"
                    class='inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                    Create Category
                </button>
                <a href="/categories" wire:navigate
                    class='inline-flex items-center px-4 py-2 bg-white border border-slate-300 rounded-md font-semibold text-sm text-zinc-700 uppercase tracking-widest hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
