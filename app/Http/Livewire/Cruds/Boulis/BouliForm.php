<?php

namespace App\Http\Livewire\Cruds\Boulis;

use App\Models\Bouli;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;


class BouliForm extends Component
{
    public $bouli;
    public $brands;
    public $brand_id;
    public $brand;

    public $rules = [
        'brand_id' => 'required',
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
        return view('livewire.cruds.boulis.bouli-form', [
            'bouli' => $this->bouli,
        ]);
    }

    public function updated($key, $value)
    {
        if (Auth::user()->hasRole('super_admin')) {
            if ($key == 'brand_id' && !empty($value)) {
                $this->brand = Brand::find($this->brand_id);
            } else if ($key == 'brand_id' && empty($value)) {
                $this->brand = new Brand();
            }
        }
    }

    public function mount()
    {
        if (!Bouli::find($this->bouli)) {
            $this->bouli = new Bouli();
        } else {
            $this->bouli = Bouli::find($this->bouli);
        }
        if (Auth::user()->hasRole('super_admin')) {
            $this->brands = Brand::all();
        }
        if (Auth::user()->hasRole('brand')) {
            if (Brand::find($this->brand)) {
                $this->brand = Brand::find($this->brand);
                $this->brand_id = $this->brand;
            } else {
                $this->brand = new Brand;
            }
        } else {
            $this->brand = new Brand;
        }
    }


    public function save()
    {
        $new = false;
        if (!isset($this->bouli->id) && isset($this->brand)) {
            $this->bouli->key_value = Str::slug($this->bouli->name . ' ' . $this->brand->legal_name . ' ' . Str::random(3), '-');
            $new = true;
            $this->bouli->brand_id = $this->brand->id;
        }

        $this->validate();

        $this->bouli->save();
        if ($new) {
            session()->flash('save-message', 'The bouli has been saved successfully');
        } else {
            session()->flash('save-message', $this->bouli->name . ' has been updated successfully');
        }
        $this->brand = new Brand();
        return redirect()->to('/boulis');
    }

    public function cancel()
    {
        return redirect()->to('/boulis');
    }
}
