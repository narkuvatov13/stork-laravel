<?php

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;
    //


    // public function render()
    // {
    //     return $this->view()->layout('layouts::app', ['users' => $this->users]);
    // }

    public string  $search = '';

    public function with(): array
    {
        // dd(User::paginate(5));
        return [
            'users' => User::latest()->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))->paginate(10),
        ];
    }
};
