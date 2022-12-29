<?php

namespace App\Http\Livewire\Cruds\Users;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    public $openFlash = false;


    public ?ModelsUser $user;

    public $userId;

    public $password;
    public $confirmPassword;

    public $showDeleteModal = false;
    public $showSaveModal = false;



    public $confirmDeleteId;
    public $entries = 5;
    public $search = '';

    public $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.phone' => 'required',
    ];

    public function render()
    {
        $data = ModelsUser::where('id', '!=', Auth::User()->id);
        if ($this->search != '') {
            $search = '%' . $this->search . '%';
            $data->where(function ($q) use ($search) {
                $q->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('phone', 'like', $search);
            });
        }


        if ($this->userId != '') {
            $this->user = User::findOrFail($this->UserId);
        }


        return view('livewire.cruds.users.user', [
            'users' => $data->orderBy('name')->paginate($this->entries)
        ]);
    }



    public function updated($propertyName)
    {
    }

    public function mount()
    {
    }

    public function save()
    {
        $this->validate();

        if ($this->user->id != null) {
            if ($this->password != null) {
                if ($this->password == $this->confirmPassword) {
                    $this->user->password = bcrypt($this->password);
                    session()->flash('save-message', 'User successfully saved');
                    $this->user->save();
                    if (isset($this->role)) {
                        $this->user->roles()->attach($this->role->id);
                    }
                    $this->resetInputs();
                } else {
                    session()->flash('password-error', 'Password not saved');
                }
            } else {
                session()->flash('save-message', 'User successfully saved');
                $this->user->save();
                if (isset($this->role)) {
                    $this->user->roles()->attach($this->role->id);
                }
                $this->resetInputs();
            }
        } else {
            if ($this->password == $this->confirmPassword) {
                $this->user->password = bcrypt($this->password);
                session()->flash('save-message', 'User successfully saved');
                $this->user->save();
                if (isset($this->role)) {
                    $this->user->roles()->attach($this->role->id);
                }
                $this->resetInputs();
            } else {
                session()->flash('password-error', 'Password not saved');
            }
        }

        $this->openFlash = true;
    }

    public function resetInputs()
    {
        $this->showSaveModal = false;
        $this->showDeleteModal = false;
        $this->openFlash = false;
        $this->user = new ModelsUser();
        $this->password = null;
        $this->confirmPassword = null;
    }

    public function addNew()
    {
        $this->resetInputs();
        $this->showSaveModal = true;
    }


    public function editOrDelete($id = null, $data)
    {
        $this->resetInputs();
        if ($id != null) {
            $this->user = ModelsUser::findOrFail($id);
            if ($data == 'edit') {
                $this->showSaveModal = true;
            }

            if ($data == 'delete') {
                $this->showDeleteModal = true;
            }
        }
    }

    public function delete()
    {
        $this->user->delete();
        $this->resetInputs();
        session()->flash('delete-message', 'User successfully deleted');
        $this->openFlash = true;
    }

}
