<?php

use App\Models\Category;
use Illuminate\Container\Attributes\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

use function Livewire\Volt\title;

new class extends Component {
    use WithPagination;

    public function save()
    {

        $this->dispatch(
            'toast-show',
            type: 'success',
            position: 'top-right',
            message: 'Kayıt Basariyla Olusturuldu',
        );
    }

    public $sortBy = 'date';
    public $sortDirection = 'desc';

    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[\Livewire\Attributes\Computed]
    public function orders()
    {
        return \App\Models\Order::query()
            ->tap(fn($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(5);
    }

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
