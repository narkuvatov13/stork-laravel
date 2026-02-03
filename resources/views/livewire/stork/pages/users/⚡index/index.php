<?php

use Livewire\Component;
use App\Models\User;

new class extends Component
{
    //


    // public function render()
    // {
    //     return $this->view()->layout('layouts::app', ['users' => $this->users]);
    // }

    public $users;

    public function mount(): void
    {
        $this->users = User::all();
    }

    public function with(): array
    {
        return [
            'users' => $this->users,
        ];
    }
};
