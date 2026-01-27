<?php

use App\Models\Category;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;


    public function render()
    {
        return $this->view()
            ->layout('layouts::app');
    }

    //Variables

    public string $search = '';

    public function with(): array
    {
        $query = Category::with('user')->latest();

        // Filter By Search
        if ($this->search) {
            $query->where('name', 'like', '%', $this->search, '%');
        }

        // Filter By Is Active

        return [
            'categories' => $query->paginate(5)
        ];
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function deleteCategory(Category $category): void
    {
        // authorize
        $category->delete();
        session()->flash('success', 'Category deleted successfully');
    }
};
