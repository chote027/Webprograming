<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Apartment_Details;
use App\Models\Room;

class apartment_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $no_room = Apartment_Details::select('no_room')->value('no_room');
        return view('user.add_roomno', compact('no_room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'room_no'=>'required',
        ]);

        $owner_id = Apartment_Details::select('owner_id')->value('owner_id');
        $apartment_name = Apartment_Details::select('apartment_name')->value('apartment_name');
        $no_room = Apartment_Details::select('no_room')->value('no_room');

        Apartment_Details::create([
            'owner_id' => $owner_id,
            'apartment_name' => $apartment_name,
            'no_room' => $no_room,
            'room_no' => $request['room_no'],
        ]);

        $room_owner_fname = Room::select('room_owner_fname')->value('room_owner_fname');
        $room_owner_lname = Room::select('room_owner_lname')->value('room_owner_lname');
        $tel = Room::select('tel')->value('tel');
        $room_owner_id_no = Room::select('room_owner_id_no')->value('room_owner_id_no');
        $room_owner_fname = Room::select('room_owner_fname')->value('room_owner_fname');
        $rent_month = Room::select('rent_month')->value('rent_month');
        $elect_cost = Room::select('elect_cost')->value('elect_cost');
        $water_cost = Room::select('water_cost')->value('water_cost');
        $others = Room::select('others')->value('others');
        $roomate = Room::select('roomate')->value('roomate');

        Room::create([
            'room_no' => $request['room_no'],
            'room_owner_fname' => $room_owner_fname,
            'room_owner_lname' => $room_owner_lname,
            'tel' => $tel,
            'room_owner_id_no' => $room_owner_id_no,
            'rent_month' => $rent_month,
            'elect_cost' => $elect_cost,
            'water_cost' => $water_cost,
            'others' => $others,
            'roomate' => $roomate,
        ]);
        
        $room = Apartment_Details::select('room_no')->where('owner_id', '=', $owner_id)->get();
        $room_count = $room->count();
        $no_room = Apartment_Details::select('no_room')->value('no_room');

        $data = Apartment_Details::select('apartment_name')->value('apartment_name');
        $room_data = Room::all();

        return view('user.dashboard',compact('room_count','no_room','data','room_data'));
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
        //
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
        $request->validate([
            'room_no'=>'required'
        ]);
        
        Apartment_Details::create([
            'room_no' => $request['room_no'],
        ]);
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
