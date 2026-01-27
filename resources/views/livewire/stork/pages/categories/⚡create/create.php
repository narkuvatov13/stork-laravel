<?php

use App\Enums\Status;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

use Livewire\Attributes\Validate;

new class extends Component {

    use WithFileUploads;
    // Validation
    #[Validate('required|string|min:3|max:255')]
    public string $name = '';


    #[Validate('required|image')]
    public $image;

    #[Validate('required')]
    public  $is_active = '1';

    // Render
    public function render()
    {
        return $this->view()->layout('layouts::app');
    }



    // Save
    public function save()
    {

        $this->validate();

        $category = new Category();

        $category->user_id =  Auth::user()->id;
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->is_active = (bool) $this->is_active;

        // dd($category->is_active);
        if ($this->image) {
            $path = $this->image->store('categories', 'public');
            $category->image = $path;
        }

        $category->save();

        session()->flash('success', 'Category created successfully!');

        // $this->redirect('/categories', navigate: true);
        return $this->redirect('/categories');
    }
};
