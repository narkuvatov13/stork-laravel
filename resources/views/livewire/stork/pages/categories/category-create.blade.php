<x-layouts.app :title="__('Categories')">
    <h1>Category Create</h1>

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class=" flex w-full  items-center  flex-col ">
            <div class="w-1/2 mb-4">
                <x-input type="text" id="name" placeholder="{{ __('Entry Category Name') }}" label="Category Name"
                    name='name' value="{{ old('name') }}">
                </x-input>
                @error('name')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-1/2">
                <flux:button class="w-full" variant="primary" color="green" type="submit">Create
                </flux:button>
            </div>
        </div>
    </form>
</x-layouts.app>
