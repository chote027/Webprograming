@extends('layouts.app')
@section('content')
<h2 class="page-section-heading text-center text-uppercase text-black mb-0">{{$data}}</h2>
<div class="row justify-content-center">
    <div class="col-10 mb-2">
        @if ($room_count < $no_room) 
            <a href="{{ route('dashboard.create') }}" class="btn btn-primary">Add room number</a>
            @else
            <a href="{{ url('/dashboard/add_roomnumber/create') }}" class="btn btn-secondary disabled" aria-pressed="true">Add room number</a>
            @endif
            <table class="table table-bordered" style="margin-top: 2rem;">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Room Number</th>
                        <th scope="col">Owner Name</th>
                        <th scope="col">Telephone Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Add/Edit</th>
                        <th scope="col">Bill</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($room_data as $r)
                    <tr>
                        <td scope="row">{{$r->room_no}}</td>
                        <td>{{$r->room_owner_fname}}</td>
                        <td>{{$r->tel}}</td>
                        @if($r->tel === 0)
                        <td>
                            <div class="p-2 bg-success text-white">ห้องว่าง</div>
                        </td>
                        @else
                        <td>
                            <div class="p-2 bg-danger text-white">ห้องมีเจ้าของ</div>
                        </td>
                        @endif
                        @php
                        $data = $r->room_no;
                        @endphp
                        <td><a href="{{route('dashboard.edit',$data)}}" class="btn btn-info" role="button">Add/Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

        /* table {
        border: 1px solid black;
    } */

        table.center {
            margin-left: auto;
            margin-right: auto;

        }

        td {
            text-align: center;
            background-color: white;
        }

        tr,
        th {
            text-align: center;
        }

        /* .row {
        background-color: #ADDFFE;
    } */
    </style>