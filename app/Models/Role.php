<?php

namespace App\Models;

use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role extends Model
{
    use HasApiTokens, HasFactory, AutoGenerateUuid, Notifiable;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'key_value',
        'type',
    ];


    public function users(){
        return $this->belongsToMany(User::class);
    }
}
