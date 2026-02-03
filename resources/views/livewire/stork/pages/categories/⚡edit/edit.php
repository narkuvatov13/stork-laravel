<?php

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

new class extends Component
{
    use WithFileUploads;

    public Category $category;

    // Validation
    #[Validate('required|string|min:3|max:255')]
    public string $name = '';

    #[Validate('required|string|min:3|max:255')]
    public string $slug = '';

    #[Validate('image|nullable')]
    public $image;


    #[Validate('required|boolean')]
    public bool $is_active;



    public string $existing_image = '';

    // public function render()
    // {
    //     return $this->view()->layout('layouts::app');
    // }

    public function mount(Category $category): void
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->is_active = $category->is_active;
        $this->existing_image = $category->image ?? '';
    }

    public function update(): void
    {
        $this->validate();

        $this->category->name = $this->name;
        $this->category->slug = Str::slug($this->name);


        if ($this->image) {
            // Delete old image if existing
            if ($this->existing_image) {
                Storage::disk('public')->delete($this->existing_image);
            }

            $path = $this->image->store('categories', 'public');
            $this->category->image = $path;
            $this->existing_image = $path;
        }
        $this->category->is_active = $this->is_active;

        $this->category->update();

        session()->flash('success', 'Category Update Successfully!');
        $this->redirect(route('categories.index'));
    }
};
