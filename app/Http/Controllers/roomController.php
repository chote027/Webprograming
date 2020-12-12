<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Apartment_Details;
use Illuminate\Support\Facades\Auth;

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
        //dd($request);
        $request->validate([
            'room_no' => 'required',
        ]);
        
        $id = Auth::user()->id_no;
        $owner_id = Apartment_Details::select('owner_id')->where('owner_id', '=', $id)->value('owner_id');
        $apartment_name = Apartment_Details::select('apartment_name')->where('owner_id', '=', $owner_id)->value('apartment_name');
        $no_room = Apartment_Details::select('no_room')->where('owner_id', '=', $owner_id)->value('no_room');

        Apartment_Details::create([
            'owner_id' => $owner_id,
            'apartment_name' => $apartment_name,
            'no_room' => $no_room,
            'room_no' => $request['room_no'],
        ]);

        // $room_owner_fname = Room::select('room_owner_fname')->value('room_owner_fname');
        // $room_owner_lname = Room::select('room_owner_lname')->value('room_owner_lname');
        // $tel = Room::select('tel')->value('tel');
        // $room_owner_id_no = Room::select('room_owner_id_no')->value('room_owner_id_no');
        // $room_owner_fname = Room::select('room_owner_fname')->value('room_owner_fname');
        $rent_month = Room::select('rent_month')->value('rent_month');
        // $elect_cost = Room::select('elect_cost')->value('elect_cost');
        // $water_cost = Room::select('water_cost')->value('water_cost');
        // $others = Room::select('others')->value('others');
        // $roomate = Room::select('roomate')->value('roomate');

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
        $no_room = Apartment_Details::select('no_room')->where('owner_id', '=', $owner_id)->value('no_room');

        $data = Apartment_Details::select('apartment_name')->where('owner_id', '=', $owner_id)->value('apartment_name');
        $room_data = Room::all()->where('owner_id', '=', $owner_id);

        return view('user.dashboard', compact('room_count', 'no_room', 'data', 'room_data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = Auth::user()->id_no;   
        $data = Room::where('owner_id', '=', $owner)->where('room_no', '=', $id)->get();

        $room_data = Room::select('*')->where('owner_id', '=', $owner)->where('room_no', '=', $id)->get();
        $rent_cost = Room::where('owner_id', '=', $owner)->where('room_no', '=', $id)->value('rent_month');
        $elect_cost = Room::where('owner_id', '=', $owner)->where('room_no', '=', $id)->value('elect_cost');
        $water_cost = Room::where('owner_id', '=', $owner)->where('room_no', '=', $id)->value('water_cost');
        $others_cost = Room::where('owner_id', '=', $owner)->where('room_no', '=', $id)->value('others');
        $total_cost = $rent_cost + $elect_cost + $water_cost + $others_cost;

        return view('user.bill', compact('total_cost','room_data'));
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

        // $room_count = Apartment_Details::where('owner_id', '=', $id)->count();
        // $no_room = Apartment_Details::select('no_room')->value('no_room');
        $owner = Apartment_Details::select('owner_id')->value('owner_id');
        // $data = Apartment_Details::select('apartment_name')->value('apartment_name');
        // $room_data = Room::all();

        //return view('user.dashboard',compact('room_count','no_room','room_data', 'data'));
        return redirect('/dashboard/' . $owner);
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
