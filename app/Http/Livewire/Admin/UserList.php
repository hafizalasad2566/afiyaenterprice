<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class UserList extends Component
{
    use WithPagination;
    use WithSorting;

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $deleteConfirmId;

    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];


    public function render()
    {
        return view('livewire.admin.user-list',[
            'users' => User::where('first_name', 'like', '%'.$this->search.'%')
            ->orWhere('last_name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortBy, $this->sortDirection)->paginate(5)
        ]);
    }
    public function deleteConfirm(){
        User::destroy($this->deleteConfirmId);
        $this->dispatchBrowserEvent('toastr', ['type' => "success",'msg'=>"User has been deleted successfully"]);
    }

    public function deleteAttempt($id){
        $this->deleteConfirmId=$id;
    }
    
}
