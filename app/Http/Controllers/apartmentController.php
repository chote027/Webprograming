<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Apartment;
use App\Models\Apartment_Details;
use App\Models\Room;
use Illuminate\Http\Request;

class apartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Apartment::all();
        return view('apartment.apartment_list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apartment.addapartment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tel'=>'required',
            'apartment_name'=>'required',
            'id_no'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:2048',
            'apartment_address'=>'required',
            'apartment_desc'=>'required',
            'no_room'=>'required',
            'rent_month'=>'required'
        ]);

        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $fileName);

        Apartment::create([
            'tel' => $request['tel'],
            'apartment_name' => $request['apartment_name'],
            'id_no' => $request['id_no'],
            'image' => $fileName,
            'apartment_address' => $request['apartment_address'],
            'apartment_desc' => $request['apartment_desc'],
            'no_room' => $request['no_room'],
            'rent_month' => $request['rent_month'],
        ]);
        
        Apartment_Details::create([
            'owner_id' => $request['id_no'],
            'apartment_name' => $request['apartment_name'],
            'no_room' => $request['no_room'],
            'room_no' => $request['room_no'],
        ]);

        Room::create([
            'owner_id' => $request['id_no'],
            'room_no' => $request['room_no'],
            'room_owner_fname'=>'-',
            'room_owner_lname'=>'-',
            'tel'=> 0,
            'room_owner_id_no'=>'-',
            'rent_month' => $request['rent_month'],
            'elect_cost'=> 0,
            'water_cost'=> 0,
            'others'=> 0,
            'roomate'=> '-',
        ]);
            
        return redirect('/Apartment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Apartment::where('id_no', '=', $id)->get();
        return view('Edit.editApartment', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'tel'=>'required',
            'apartment_name'=>'required',
            //'id_no'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:2048',
            'apartment_address'=>'required',
            'apartment_desc'=>'required',
            'no_room'=>'required',
            'rent_month'=>'required'
        ]);

        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $fileName);

        Apartment::find($id)->update([
            'tel' => $request['tel'],
            'apartment_name' => $request['apartment_name'],
            //'id_no' => $request['id_no'],
            'image' => $fileName,
            'apartment_address' => $request['apartment_address'],
            'apartment_desc' => $request['apartment_desc'],
            'no_room' => $request['no_room'],
            'rent_month' => $request['rent_month'],
        ]);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
