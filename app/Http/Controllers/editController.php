<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;

class editController extends Controller
{
    public function editProfile($id)
    {
        $data = Apartment::where('id_no', '=', $id)->get();
        //dd($data);
        return view('Edit.editProfile', compact('data'));
    }

    public function editApartment($id)
    {
        $data = Apartment::where('id_no', '=', $id)->get();
        return view('Edit.editApartment', compact('data'));
    }
}
