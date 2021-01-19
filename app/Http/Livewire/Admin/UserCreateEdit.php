<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;


class UserCreateEdit extends Component
{
    public $edit=false;
    public $user;
      /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];
    
    public function mount($user=null){
        if($user){
            $this->user=$user;
            $this->state=$user->toArray();
            $this->edit=true;
        }
    }
    public function validationRuleForSave(): array{
        return 
        [
            'state.name' => 'required',
            'state.email' => 'required',
            'state.password' => 'required'
        ];
    }

    public function validationRuleForUpdate(): array{
        return 
            [
                'state.name' => 'required',
                'state.email' => 'required',
            ];
    }
    
    public function saveOrUpdate()
    {
         if($this->edit)
             $this->validate($this->validationRuleForUpdate());
         else {
            $this->validate($this->validationRuleForSave());
            $this->user=new User;
         }

        $this->user->fill($this->state)->save();
        $msgAction=$this->edit ? 'updated' : 'added';
        session()->flash('success', 'User was '.$msgAction.' successfully');

        return redirect()->route('users.index');
    }
    public function render()
    {
        return view('livewire.admin.user-create-edit');
    }
}
