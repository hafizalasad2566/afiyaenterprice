<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class UserCreateEdit extends Component
{
    public $first_name,$last_name, $email, $password,$password_confirmation,$user;
    public $isEdit=false;

    public function mount($user = null)
    {
        if ($user) {
            $this->user = $user;
            $this->fill($this->user);
            $this->isEdit=true;
        }
        else
            $this->user=new User;
    }
    public function validationRuleForSave(): array
    {
        return
            [
                'first_name' => ['required', 'max:255'],
                'last_name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')],
                'password' => ['required', 'max:255', 'min:6', 'confirmed'],
                'password_confirmation' => ['required', 'max:255', 'min:6'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [   'first_name' => ['required', 'max:255'],
                'last_name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            ];
    }

    public function saveOrUpdate()
    {
        $this->user->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        $this->user->assignRole('CLIENT');
        $msgAction = $this->user ? 'updated' : 'added';
        session()->flash('success', 'User was ' . $msgAction . ' successfully');

        return redirect()->route('users.index');
    }
    public function render()
    {
        return view('livewire.admin.user-create-edit');
    }
}
