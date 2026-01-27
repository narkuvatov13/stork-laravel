<?php

use App\Enums\Status;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

use Livewire\Attributes\Validate;

new class extends Component {

    // Validation
    #[Validate('required|string|min:3|max:255')]
    public string $name = '';

    #[Validate('required|string|min:3|max:255')]
    public string $slug = '';

    #[Validate('required|image|max:2048')]
    public $image;

    // public bool $is_active = Status::ACTIVE;


    // Save
    public function save()
    {
        $this->validate();

        $category = new Category();

        $category->user_id =  Auth::user()->id;
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        // $category->is_active = $this->is_active;

        if ($this->image) {
            $path = $this->image->store('categories', 'public');
            $category->image = $path;
        }

        $category->save();

        session()->flash('success', 'Category created successfully!');

        $this->redirect(route('categories.index'), navigate: true);
    }
};
