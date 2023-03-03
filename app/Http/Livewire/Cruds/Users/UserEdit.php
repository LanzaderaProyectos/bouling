<?php

namespace App\Http\Livewire\Cruds\Users;

use App\Models\Brand;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEdit extends Component
{
    public $openFlash = true;


    public ?User $user;
    public ?Brand $brand;


    public $currentPassword;
    public $changePassword;
    public $confirmPassword;

    public $showDeleteModal = false;

    public $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.phone' => 'required',
    ];
    public function render()
    {

        return view('livewire.cruds.users.user-edit');
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->brand = Brand::find($this->user->brand_id);
    }

    public function resetInputs()
    {
        $this->showDeleteModal  = false;
        $this->currentPassword  = null;
        $this->changePassword   = null;
        $this->confirmPassword  = null;
    }

    public function changePassword()
    {
        if ((password_verify($this->currentPassword, (Auth::user()->password)))) {
            if (($this->changePassword != '' || $this->changePassword != null)) {
                if ($this->changePassword == $this->confirmPassword) {
                    $this->user = User::find($this->user->id);
                    $this->user->password = Hash::make($this->changePassword);
                    $this->user->save();
                    session()->flash('save-message', 'User successfully updated');
                    $this->resetInputs();
                    $this->render();
                } else {
                    session()->flash('error-message', 'The new password has not been successfully verified');
                }
            }
        } else {
            if ($this->currentPassword != null || $this->currentPassword != '') {
                if (($this->changePassword != '' || $this->changePassword != null)) {
                    session()->flash('error-message', 'Password not updated, the original password is incorrect');
                }
            }
        }
    }

    public function save()
    {
        $this->openFlash = true;
        if (isset($this->account)) {
            $this->user->account_id = $this->account->id;
        }
        $this->validate();


        $this->user->save();
        session()->flash('save-message', 'User successfully updated');

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
