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
    protected $messages = [
        'state.name.required' => 'The Namecannot be empty.',
        'state.email.unique' => 'The email has already been taken.',
    ];
    
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
            'state.email' => 'required|unique:users,email',
            'state.password' => 'required|min:6|confirmed'
        ];
    }

    public function validationRuleForUpdate(): array{
        return 
            [
                'state.name' => 'required',
                'state.email' => 'required|unique:users,email,'.$this->user->id,
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
