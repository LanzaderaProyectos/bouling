<?php

namespace App\Http\Livewire\Cruds\Users;

use App\Models\Account;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserEdit extends Component
{
    public $openFlash = true;


    public ?User $user;

    public $password;
    public $confirmPassword;

    public $showDeleteModal = false;

    public $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.phone' => 'required',
        'user.timezone' => 'required',
        'user.date_format' => 'required',
        'user.decimals_number'  => 'required',
        'user.decimals_pointer'  => 'required',
        'user.thousands_pointer'  => 'required',
        'user.default_locale' => 'nullable',
        'user.personal_email' => 'nullable',
        'user.personal_phone' => 'nullable',
        'user.personal_address' => 'nullable',
    ];
    public function render()
    {

        return view('livewire.cruds.users.user-edit');
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->roles = Role::all();
        $this->accounts = Account::all();
    }

    public function resetInputs()
    {
        $this->showDeleteModal = false;
        $this->password = null;
        $this->confirmPassword = null;
    }

    public function save()
    {
        $this->openFlash = true;
        if (isset($this->account)) {
            $this->user->account_id = $this->account->id;
        }
        $this->validate();

        if ($this->password != null) {
            if ($this->password == $this->confirmPassword) {
                $this->user->password = bcrypt($this->password);
                $this->user->save();
                session()->flash('save-message', 'User successfully updated');
            } else {
                session()->flash('error-message', 'Password does not match');
            }
        } else {
            $this->user->save();
            session()->flash('save-message', 'User successfully updated');
        }
        if (isset($this->role)) {
            $this->user->roles()->attach($this->role->id);
        }

        $this->resetInputs();
        $this->render();
    }

    public function openDeleteModal()
    {
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $this->resetInputs();
        $this->user->roles()->detach();
        $this->user->delete();
        return redirect()->to('/');
    }
}
