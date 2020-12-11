<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Apartment_Details;
use App\Models\Room;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

        $rent_month = Room::select('rent_month')->value('rent_month');
        
        Room::create([
            'owner_id' => $owner_id,
            'room_no' => $request['room_no'],
            'room_owner_fname' => '-',
            'room_owner_lname' => '-',
            'tel' => 0,
            'room_owner_id_no' => '-',
            'rent_month' => $rent_month,
            'elect_cost' => 0,
            'water_cost' => 0,
            'others' => 0,
            'roomate' => '-',
        ]);
        
        $room_count = Apartment_Details::where('owner_id', '=', $owner_id)->count();
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
        $room_count = Apartment_Details::where('owner_id', '=', $id)->count();
        $no_room = Apartment_Details::select('no_room')->value('no_room');

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
        $data = Room::where('room_no', '=', $id)->get();
        return view('user.edit_roomer', compact('data'));
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

        $owner = Apartment_Details::select('owner_id')->value('owner_id');

        return redirect('/dashboard/'.$owner);
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
