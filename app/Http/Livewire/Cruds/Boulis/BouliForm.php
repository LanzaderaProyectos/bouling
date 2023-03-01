<?php

namespace App\Http\Livewire\Cruds\Boulis;

use App\Models\Bouli;
use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;


class BouliForm extends Component
{
    public $bouli;
    public $brands;
    public $brand_id;
    public Brand $brand;

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
            'bouli' => $this->bouli
        ]);
    }

    public function updated($key, $value)
    {
        if ($key == 'brand_id' && !empty($value)) {
            $this->brand = Brand::find($this->brand_id);
        } else if($key == 'brand_id' && empty($value)) {
            $this->brand = new Brand();
        }
    }

    public function save()
    {
        if (!isset($this->bouli->id) && isset($this->brand)) {
            $this->bouli->key_value = Str::slug($this->bouli->name . ' ' . $this->brand->legal_name . ' ' . Str::random(3), '-');
        }

        $this->validate();
        $this->bouli->brand_id = $this->brand->id;
        $this->bouli->save();
    }


    public function mount()
    {
        $this->brands = Brand::all();
        if (!Bouli::find($this->bouli)) {
            $this->bouli = new Bouli();
        } else {
            $this->bouli = Bouli::find($this->bouli);
        }
    }
}
