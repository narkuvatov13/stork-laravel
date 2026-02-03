<?php

use App\Models\Category;
use Illuminate\Container\Attributes\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;


    // public function render()
    // {
    //     return $this->view()
    //         ->layout('layouts::app');
    // }

    //Variables

    public string $search = '';

    public function with(): array
    {
        return [
            'categories' => Category::with('user')
                ->latest()
                ->when(
                    $this->search,
                    fn($q) =>
                    $q->where('name', 'like', '%' . $this->search . '%')
                )
                ->paginate(5),
        ];
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    #[On('delete')]
    public function deleteCategory(Category $category): void
    {
        // authorize
        $category->delete();
        session()->flash('success', 'Category deleted successfully');
    }
};
