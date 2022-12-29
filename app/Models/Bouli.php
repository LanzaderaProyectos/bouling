<?php

namespace App\Models;

use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouli extends Model
{
    use HasFactory, AutoGenerateUuid;


    public $incrementing = false;
    protected $keyType = 'string';
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
