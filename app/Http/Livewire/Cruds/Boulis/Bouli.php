<?php

namespace App\Http\Livewire\Cruds\Boulis;

use App\Models\Bouli as ModelsBouli;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Bouli extends Component
{

    use WithPagination;

    public $openFlash = false;


    public ?ModelsBouli $bouli;



    public $showDeleteModal = false;
    public $showSaveModal = false;

    public $new = false;

    // Default Instagram
    public $social_network = 'instagram';

    public ?Brand $brand;

    public $brandId;

    public $condition;

    public $confirmDeleteId;
    public $entries = 5;
    public $search = '';

    public $rules = [
        'bouli.name' => 'required',
        'bouli.key_value' => 'required',
        'bouli.description'  => 'required',
        'bouli.social_network'  => 'required',
        'bouli.requirement'  => 'required',
        'bouli.reward' => 'nullable',
        'bouli.condition' => 'nullable',
        'bouli.date_start' => 'nullable',
        'bouli.date_finish' => 'nullable',
    ];

    public function render()
    {
        $data = ModelsBouli::select('*');
        if ($this->search != '') {
            $search = '%' . $this->search . '%';
            $data->where(function ($q) use ($search) {
                $q->where('name', 'like', $search)
                    ->orWhere('social_network', 'like', $search)
                    ->orWhere('condition', 'like', $search)
                    ->orWhere('key_value', 'like', $search)
                    ->orWhere('reward', 'like', $search);
            });
        }

        if ($this->brandId != '') {
            $this->brand = Brand::findOrFail($this->brandId);
        }


        return view('livewire.cruds.boulis.bouli', [
            'boulis' => $data->orderBy('name')->paginate($this->entries)
        ]);
    }



    public function updated($propertyName, $propertyValue)
    {
    }

    public function mount()
    {
        $this->brands = Brand::all();
    }

    public function save()
    {

        if (isset($this->brand)) {
            $this->bouli->brand_id = $this->brand->id;
        }
        $this->bouli->social_network = $this->social_network;
        if ($this->bouli->id != null) {
            if ($this->condition != '') {
                $this->bouli->condition = $this->condition;
            }
            $this->validate();
            $this->bouli->save();
            $this->resetInputs();
            $this->openFlash = true;
            session()->flash('save-message', 'Bouli successfully saved');
        } else {
            if ($this->condition != '') {
                $this->bouli->condition = $this->condition;
                $this->validate();
                $this->bouli->save();
                $this->resetInputs();
                $this->openFlash = true;
                session()->flash('save-message', 'Bouli successfully saved');
            } else {
                session()->flash('error-form-message', 'Bouli successfully saved');
            }
        }
    }

    public function resetInputs()
    {
        $this->showSaveModal = false;
        $this->showDeleteModal = false;
        $this->openFlash = false;
        $this->bouli = new ModelsBouli();
        $this->brandId = null;
        $this->brand = null;
        $this->social_network = 'instagram';
        $this->condition = null;
        $this->new = false;
    }

    public function addNew()
    {
        $this->resetInputs();
        $this->showSaveModal = true;
        $this->new = true;
    }


    public function editOrDelete($id = null, $data)
    {

        $this->resetInputs();
        if ($id != null) {
            $this->bouli = ModelsBouli::findOrFail($id);
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
        $this->bouli->delete();
        $this->resetInputs();
        session()->flash('delete-message', 'Bouli successfully deleted');
        $this->openFlash = true;
    }
}
