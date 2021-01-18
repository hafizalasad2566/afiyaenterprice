<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $deleteConfirmId;

    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];


    public function render()
    {
        return view('livewire.admin.user-list',[
            'users' => User::orderBy('id', 'DESC')->paginate(8)
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
