<x-layouts.app :title="__('Categories')">
    {{-- Header --}}
    <nav class="flex mb-2" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center space-x-1.5">
                    <a href="#"
                        class="inline-flex text-white items-center text-xl font-medium ">{{ __('Category Create') }}</a>
                </div>
            </li>

        </ol>
    </nav>

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class=" flex w-full  items-center  flex-col ">
            <div class="w-1/2 mb-4">
                <x-input type="text" id="name" placeholder="{{ __('Entry Category Name') }}"
                    label="Category Name" name='name' value="{{ old('name') }}">
                </x-input>
                @error('name')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                @enderror

                <div x-data="{ preview: null }" class="mt-2">
                    <label class="block mb-1 text-base font-medium text-white" for="file_input">Upload Category
                        Image</label>
                    <input
                        class="cursor-pointer bg-white text-zinc-600 text-sm   w-full shadow-xs placeholder:text-zinc-200"
                        id="file_input" type="file" name="image" accept="image/*" value="{{ old('image') }}"
                        @change="
                        const file = $event.target.files[0];
                        if (!file) return;
                        preview = URL.createObjectURL(file);

                    ">
                    <img class="mt-2 max-w-52" x-show="preview" :src="preview"
                        style="max-width: 200px max-height: 200px">
                </div>



                @error('image')
                    <div class="text-xs text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-1/2">
                <flux:button class="w-full font-medium" variant="primary" color="green" type="submit">Create
                </flux:button>
            </div>
        </div>
    </form>


</x-layouts.app>
