<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;

class searchController extends Controller
{
    public function search(Request $request)
    {
        $data = '';
        if (!empty($request->apartment_address)) {
            $query = $request->apartment_address;
            $data = Apartment::query()->where('apartment_address', 'like', '%' . $query . '%')->get();
            $total_row = $data->count();
        }
        return view('apartment.search', ['place' => $data]);
    }
}
