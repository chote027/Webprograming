@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-10 mb-2">
    @if ($room_count < $no_room) 
        <a href="{{ url('/addroom/add_roomnumber/create') }}" class="btn btn-primary">Add room number</a>

        <table class="table" style="margin-top: 2rem;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Room Number</th>
                    <th scope="col">Owner Name</th>
                    <th scope="col">Telephone Number</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($room_data as $r)
                <tr>
                    <td scope="row">{{$r->room_no}}</td>
                    <td>{{$r->room_owner_fname}}</td>
                    <td>{{$r->tel}}</td>
                    @if($r->tel === 0)
                    <td class="table-success">ห้องว่าง</td>
                    @else
                    <td class="table-danger">ห้องมีเจ้าของ</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        @else
        <a href="{{ url('/addroom/add_roomnumber/create') }}" class="btn btn-primary">Add room number</a>

        <table class="table" style="margin-top: 2rem;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Room Number</th>
                    <th scope="col">Owner Name</th>
                    <th scope="col">Telephone Number</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($room_data as $r)
                <tr>
                    <td scope="row">{{$r->room_no}}</td>
                    <td>{{$r->room_owner_fname}}</td>
                    <td>{{$r->tel}}</td>
                    @if($r->tel === 0)
                    <td class="table-success">ห้องว่าง</td>
                    @else
                    <td class="table-danger">ห้องมีเจ้าของ</td>
                    @endif
                    <td>{{$r->tel}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
</div>
        
@endsection
<style>
    #item {
        width: 600px;
        min-height: 300px;
        max-width: 40rem;
        padding-left: 1rem;
    }

    .card {
        margin-right: 1rem;
        min-height: 390px;
    }

    .card-title {
        color: #086CFC;
    }
</style>