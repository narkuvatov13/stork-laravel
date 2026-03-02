<div>
    {{-- Categories Heading --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold dark:text-slate-100 text-zinc-900"> User Create</h1>
        {{-- <p class="mt-1 text-sm dark:text-slate-400 text-zinc-600">Manage your categories</p> --}}
    </div>

    {{-- Category Form --}}

    <div class="bg-white  rounded-lg border border-slate-200 p-6">
        <form wire:submit.prevent="save" class='space-y-6'>
            {{-- Name --}}
            <div class="">
                <label for="name" class= 'block text-sm font-medium text-zinc-700'> Name </label>
                <input type="text" id='name' wire:model='name' placeholder='Enter User Name' autofocus
                    class='mt-1 block w-full rounded-md text-zinc-800 border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500'>
                @error('name')
                    <p class='mt-1 text-sm text-red-600'>{{ $message }}</p>
                @enderror
            </div>
            {{-- Email --}}
            <div class="">
                <label for="email" class= 'block text-sm font-medium text-zinc-700'> Name </label>
                <input type="email" id='email' wire:model='email' placeholder='Enter User Email'
                    class='mt-1 block w-full rounded-md text-zinc-800 border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500'>
                @error('email')
                    <p class='mt-1 text-sm text-red-600'>{{ $message }}</p>
                @enderror
            </div>



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

                @error('is_active')
                    <p class='mt-1 text-sm text-red-600'>{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}

            <div class="flex gap-3">
                <button type="submit"
                    class='inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                    Create Category
                </button>
                <a href="/users" wire:navigate
                    class='inline-flex items-center px-4 py-2 bg-white border border-slate-300 rounded-md font-semibold text-sm text-zinc-700 uppercase tracking-widest hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
