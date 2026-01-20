<x-layouts.app :title="__('Categories')">
    <h1>Category Listeleri</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class=" flex w-full  items-center  flex-col ">
            <div class="w-1/2 mb-4">
                <x-input id="categoryName" placeholder="{{ __('Entry Category Name') }}" label="Category Name"
                    name='categoryName'></x-input>
            </div>



            <div class="w-1/2">
                <flux:button class="w-full" variant="primary" color="green" type="submit">Create
                    {{ \App\Enums\Status::INACTIVE }}
                </flux:button>
            </div>
        </div>
    </form>
</x-layouts.app>
