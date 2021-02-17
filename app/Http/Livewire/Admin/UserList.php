<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class UserList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;

    protected $paginationTheme = 'bootstrap';

    public $search;
    protected $listeners = ['deleteConfirm','changeStatus'];


    public function render()
    {
        return view('livewire.admin.user-list',[
            'users' => User::WhereRaw(
                "concat(first_name,' ', last_name) like '%" . $this->search . "%' "
            )
            ->OrWhere('first_name', 'like', '%'.$this->search.'%')
            ->orWhere('last_name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('phone', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->role('CLIENT')
            ->paginate(5)
        ]);
    }
    public function deleteConfirm($id){
        User::destroy($id);
        $this->showModal('success','Success','User has been deleted successfully');
    }
    public function deleteAttempt($id){
        $this->showConfirmation("warning",'Are you sure?',"You won't be able to recover this user!",'Yes, delete!','deleteConfirm',['id'=>$id]);//($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id){
        $this->showConfirmation("warning",'Are you sure?',"Do you want to change this status?",'Yes, Change!','changeStatus',['id'=>$id]);//($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(User $user){
        $user->fill(['active'=>($user->active== 1) ? 0 : 1])->save();
        $this->showModal('success','Success','User status has been changed successfully');
    }
}
