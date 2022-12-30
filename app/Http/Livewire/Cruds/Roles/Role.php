<?php

namespace App\Http\Livewire\Cruds\Roles;

use App\Models\Role as ModelsRole;
use Livewire\Component;
use Livewire\WithPagination;

class Role extends Component
{
    use WithPagination;

    public ModelsRole $role;


    public $openFlash = false;
    public $roleId;

    public $search = '';
    public $entries = 4;

    /**
     * @var bool
     */
    public $showDeleteModal = false;
    public $showSaveModal = false;



    public $rules = [
        'role.name' => 'required',
        'role.key_value' => 'required',
        'role.type' => 'required',
    ];
    public function render()
    {
        $data = ModelsRole::select('*');
        if ($this->search != '') {
            $search = '%' . $this->search . '%';
            $data->where(function ($q) use ($search) {
                $q->where('name', 'like', $search)
                    ->orWhere('key_value', 'like', $search)
                    ->orWhere('created_at', 'like', $search);
            });
        }

        if ($this->roleId != '') {
            $this->role = ModelsRole::findOrFail($this->roleId);
        }
        return view('livewire.cruds.roles.role', [
            'roles' => $data->orderBy('name')->paginate($this->entries)
        ]);
    }

    public function updated($keyValue, $value)
    {
        // dd($keyValue . ':' . $value);
    }

    public function save()
    {
        $this->validate();
        $this->role->save();
        session()->flash('save-message', 'Role successfully saved');
        $this->resetInputs();
        $this->openFlash = true;

    }

    public function resetInputs()
    {
        $this->showSaveModal = false;
        $this->showDeleteModal = false;

        $this->role = new ModelsRole();
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
            $this->role = ModelsRole::findOrFail($id);
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
        $this->role->users()->detach();
        $this->role->delete();
        $this->resetInputs();
        session()->flash('delete-message', 'Role successfully deleted');
        $this->openFlash = true;
    }
}
