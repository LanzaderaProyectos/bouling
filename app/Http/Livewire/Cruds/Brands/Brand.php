<?php

namespace App\Http\Livewire\Cruds\Brands;

use App\Models\Brand as ModelsBrand;
use Livewire\Component;
use Livewire\WithPagination;

class Brand extends Component
{

    use WithPagination;


    public ModelsBrand $brand;
    public $brandId;
    public $search = '';


    public $openFlash = false;

    public $showDeleteModal = false;
    public $showSaveModal = false;


    public $entries = 4;


    public $rules = [
        'brand.name' => 'required',
        'brand.legal_name' => 'required',
        'brand.address' => 'required',
        'brand.state' => 'required',
        'brand.country' => 'required',
        'brand.postal_code' => 'required',
        'brand.phone' => 'required',
        'brand.email' => 'required|email',
        'brand.city' => 'required',
    ];
    public function render()
    {

        $data = ModelsBrand::select('*');
        if ($this->search != '') {
            $search = '%' . $this->search . '%';
            $data->where(function ($q) use ($search) {
                $q->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('phone', 'like', $search)
                    ->orWhere('legal_name', 'like', $search)
                    ->orWhere('state', 'like', $search)
                    ->orWhere('country', 'like', $search)
                    ->orWhere('postal_code', 'like', $search)
                    ->orWhere('city', 'like', $search);
            });
        }

        if ($this->brandId != '') {
            $this->brandId = ModelsBrand::findOrFail($this->userId);
        }



        return view('livewire.cruds.brands.brand', [
            'brands' => $data->orderBy('name')->paginate($this->entries)
        ]);
    }

    public function save()
    {

        $this->validate();
        $this->brand->save();
        $this->resetInputs();
        $this->openFlash = true;
        session()->flash('save-message', 'Country successfully saved');

    }

    public function resetInputs()
    {
        $this->showSaveModal = false;
        $this->showDeleteModal = false;
        $this->brand = new ModelsBrand();

    }

    public function addNew()
    {
        $this->resetInputs();
        $this->showSaveModal = true;

    }

    public function editOrDelete($id = null,$data)
    {
        $this->resetInputs();
        if ($id != null) {
            $this->brand = ModelsBrand::findOrFail($id);
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
        $this->brand->delete();
        $this->resetInputs();
        $this->openFlash = true;
        session()->flash('delete-message', 'Brand successfully deleted');
    }
}
