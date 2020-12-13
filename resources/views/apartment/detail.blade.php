@extends('layouts.app')
@section('content')
<div class="row">
    @foreach($data as $u)
    <div class="col-6 col-md-5 mb-5">
        <img class="img-fluid" id="item" src="{{asset('uploads/'.$u->image)}}" alt="" />
    </div>
    <div class="col-8 col-md-7" style="padding-left:3rem">
        <div class="card bg-light mb-3">
            <div class="card-body">
                <h1 class="card-title">{{$u->apartment_name}}</h1>
                <h4 class="card-text">{{$u->apartment_desc}}</h4>
            </div>
            <div class="card-footer bg-light">
                <h5 class="card-text">Number of Rooms {{$u->no_room}} ห้อง</h5>
                <h5 class="card-text">Availabel Rooms {{$room_available}} ห้อง</h5>
                <h5 class="card-text">Rooms Rate {{$u->rent_month}} บาท</h5>
            </div>
        </div>
        
    </div>
    <div class ="text-left" style="padding-left:2rem">
            <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>
        </div>
</div>
</div>
@endforeach
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