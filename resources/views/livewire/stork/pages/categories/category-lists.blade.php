<x-layouts.app :title="__('Categories')">
    <h1>Categories List</h1>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-neutral-200">
                        <thead>
                            <tr class="text-neutral-100">
                                <th class="px-5 py-3 text-xs font-medium text-left uppercase">Name</th>
                                <th class="px-5 py-3 text-xs font-medium text-right uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-200">
                            @foreach ($categories as $category)
                                <tr class="text-neutral-800 bg-neutral-50">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                        {{ __($category->name) }}</td>
                                    {{-- <td class="px-5 py-4 text-sm whitespace-nowrap">35</td> --}}
                                    {{-- <td class="px-5 py-4 text-sm whitespace-nowrap">2030 Stewart Drive, Sunnyvale</td> --}}
                                    <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
