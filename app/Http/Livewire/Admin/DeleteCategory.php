<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class DeleteCategory extends Component
{
    public $category;

    protected $listeners = ['destroyCategory'];

    public function destroyCategory($id)
    {
        Category::destroy($id);
    }

    public function deleteCategory($id)
    {
        $this->dispatchBrowserEvent('deleteCat', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.admin.delete-category');
    }
}
