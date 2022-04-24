<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{

    use WithPagination;
    public $search;
    public $selected_users=[];
    public $checkAll=false;


    public function checkAll()
    {
        if($this->checkAll==false){
            $this->selected_users=User::query()->pluck('id');
            $this->checkAll=true;
        }else{
            $this->selected_users=[];
            $this->checkAll=false;
        }
    }

    // public function updatedCheckAll($value){
    //    if ($value) {
    //     $this->selected_users=User::query()->pluck('id');
    //    } else {
    //     $this->selected_users=[];
    //    }
    // }

    public function DeleteAll(){
        $users = User::query()->whereIn('id',$this->selected_users)->get();
                 dd($users);
                 $this->selected_users=[];
                 $this->checkAll=false;
    }
    

    public function render()
    {
        $users = User::query()->where('name','like', "%" .$this->search . "%")->paginate(10);

        return view('livewire.admin.user-list', compact('users'));
    }
}
