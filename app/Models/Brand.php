<?php

namespace App\Models;

use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, AutoGenerateUuid;

    public $incrementing = false;
    protected $keyType = 'string';


    public function boulis(){
        return $this->hasMany(Bouli::class, 'brand_id');
    }
}
