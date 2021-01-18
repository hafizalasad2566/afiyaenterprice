<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserCreateEdit extends Component
{
    public $user,$name, $email,$password;
    public $edit=false;
    
    public function mount($user=null){
        if($user){
            $this->user=$user;
            $this->edit=true;
            $this->fill($this->user);
        }
    }
    public function validationRuleForSave(): array{
        return 
        [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function validationRuleForUpdate(): array{
        return 
            [
                'name' => 'required',
                'email' => 'required',
            ];
    }
    
    public function saveOrUpdate()
    {
         if($this->edit)
             $validatedData = $this->validate($this->validationRuleForUpdate());
         else {
            $validatedData = $this->validate($this->validationRuleForSave());
            $this->user=new User;
         }

        $this->user->fill($validatedData)->save();
        $msgAction=$this->edit ? 'updated' : 'added';
        session()->flash('success', 'User was '.$msgAction.' successfully');

        return redirect()->route('users.index');
    }
    public function render()
    {
        return view('livewire.admin.user-create-edit');
    }
}
