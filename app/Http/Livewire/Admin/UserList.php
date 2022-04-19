<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{

    use WithPagination;
    public $search;

    public function render()
    {
        $users = User::query()->where('name','like', "%" .$this->search . "%")->paginate(10);

        return view('livewire.admin.user-list', compact('users'));
    }
}
