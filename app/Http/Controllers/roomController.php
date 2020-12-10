<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Apartment_Details;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $room = Room::all();
        // return view('user.dashboard',compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add_roomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $room = Apartment_Details::select('room_no')->where('owner_id', '=', $id)->get();
        // $room_count = $room->count();
        $room_count = Apartment_Details::where('owner_id', '=', $id)->count();
        $no_room = Apartment_Details::select('no_room')->value('no_room');
        // $no_room = Apartment_Details::select('no_room')->value('no_room');

        $data = Apartment_Details::select('apartment_name')->value('apartment_name');
        $room_data = Room::all();

        return view('user.dashboard',compact('room_count','no_room','room_data', 'data'));
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
        //dd($request);
        // $request->validate([
        //     'room_no' => 'required',
        //     'room_owner_fname' => 'required',
        //     'room_owner_lname' => 'required',
        //     'tel' => 'required',
        //     'room_owner_id_no' => 'required',
        //     'rent_month' => 'required',
        //     'elect_cost' => 'required',
        //     'water_cost' => 'required',
        //     'others' => 'required',
        //     'roomate' => 'required',
        // ]);
        
        Room::find($id)->update([
            'room_no' => $request['room_no'],
            'room_owner_fname' => $request['room_owner_fname'],
            'room_owner_lname' => $request['room_owner_lname'],
            'tel' => $request['tel'],
            'room_owner_id_no' => $request['room_owner_id_no'],
            'rent_month' => $request['rent_month'],
            'elect_cost' => $request['elect'],
            'water_cost' => $request['water'],
            'others' => $request['others'],
            'roomate' => $request['roomate'],
        ]);

        $room_count = Apartment_Details::where('owner_id', '=', $id)->count();
        $no_room = Apartment_Details::select('no_room')->value('no_room');

        $data = Apartment_Details::select('apartment_name')->value('apartment_name');
        $room_data = Room::all();

        return view('user.dashboard',compact('room_count','no_room','room_data', 'data'));
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
