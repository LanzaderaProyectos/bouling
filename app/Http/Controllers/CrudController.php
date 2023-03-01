<?php

namespace App\Http\Controllers;

use App\Models\Bouli;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function user()
    {
        return view('cruds.users.index');
    }

    public function userEdit()
    {
        return view('cruds.users.edit');
    }

    public function role()
    {
        return view('cruds.roles.index');
    }

    public function brand()
    {
        return view('cruds.brands.index');
    }

    public function bouli()
    {
        return view('cruds.boulis.index');
    }

    public function editOrCreateBouli($bouli = null){
        return view('cruds.boulis.form', [
            'bouli' => $bouli
        ]);
    }
}
