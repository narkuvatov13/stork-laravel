<x-layouts.app :title="__('Categories')">

    {{-- Alert --}}
    <div class="p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft" role="alert">
        <span class="font-medium">Success alert!</span> Change a few things up and try submitting again.
    </div>



    {{-- Header --}}
    <nav class="flex mb-2" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center space-x-1.5">
                    <a href="#"
                        class="inline-flex text-white items-center text-xl font-medium ">{{ __('Category Lists') }}</a>
                </div>
            </li>

        </ol>
    </nav>

    {{-- Table --}}
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full">
                <div class="overflow-hidden">
                    <div class="relative overflow-x-auto bg-zinc-700 shadow-xs rounded-base ">
                        {{-- Table Header --}}
                        <div
                            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 p-4">

                            <label for="input-group-1" class="sr-only">{{ __('Search') }}</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-zinc-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-1"
                                    class="block w-full max-w-96 ps-9 pe-3 py-2 bg-white border border-white text-zinc-600 text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-zing-400"
                                    placeholder="Search">
                            </div>
                        </div>
                        {{-- Table Body --}}
                        <table class="w-full text-sm text-left rtl:text-right text-white">
                            <thead class="text-sm text-white bg-zinc-700 border-b border-t border-zinc-600">
                                <tr>

                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Name
                                    </th>

                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="bg-white border-b border-default hover:bg-zinc-200 transition-all">

                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-heading whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('storage/' . $category->image) }}"
                                                alt="{{ $category->image }}">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold text-zinc-900">
                                                    {{ $category->name }}</div>
                                            </div>
                                        </th>

                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="h-2.5 w-2.5 rounded-full {{ $category->is_active == true ? 'bg-success' : 'bg-danger' }}  me-2">
                                                </div>
                                                <p
                                                    class="{{ $category->is_active == true ? 'text-success' : 'text-danger' }}">
                                                    {{ $category->is_active == true ? 'Active' : 'InActive' }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="font-medium text-success hover:underline">
                                                Edit
                                            </a>
                                            <a href="#"
                                                class="pl-0.5 font-medium border-l-2 border-zinc-400 text-red-700 hover:underline">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Paginate --}}
    <nav aria-label="Page navigation example">
        <ul class="flex -space-x-px text-sm">
            <li>
                <a href="#"
                    class="flex items-center justify-center text-zinc-600 bg-white box-border border border-zinc-300 hover:bg-zinc-200 hover:text-zinc-600 font-medium rounded-s-base text-sm px-3 h-10 focus:outline-none">Previous</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center text-zinc-600 bg-white box-border border  border-zinc-300 hover:bg-zinc-200 hover:text-zinc-600 font-medium text-sm w-10 h-10 focus:outline-none">1</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center text-zinc-600 bg-white box-border border  border-zinc-300 hover:bg-zinc-200 hover:text-zinc-600 font-medium text-sm w-10 h-10 focus:outline-none">1</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center text-zinc-600 bg-white box-border border  border-zinc-300 hover:bg-zinc-200 hover:text-zinc-600 font-medium text-sm w-10 h-10 focus:outline-none">1</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center text-zinc-600 bg-white box-border border  border-zinc-300 hover:bg-zinc-200 hover:text-zinc-600 font-medium text-sm w-10 h-10 focus:outline-none">1</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center text-zinc-600 bg-white box-border border  border-zinc-300 hover:bg-zinc-200 hover:text-zinc-600 font-medium rounded-e-base text-sm px-3 h-10 focus:outline-none">Next</a>
            </li>
        </ul>
    </nav>
</x-layouts.app>
