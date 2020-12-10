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
                <h5 class="card-text">คำอธิบายเพิ่มเติม {{$u->apartment_desc}}</h3>
            </div>
            <div class="card-footer bg-light">
                <h5 class="card-text">จำนวนห้องพักทั้งหมด {{$u->no_room}} ห้อง</h5>
                <h5 class="card-text">ค่าเช่าห้องต่อเดือน {{$u->rent_month}} บาท</h5>
            </div>
        </div>
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
        color:#086CFC;
    }
    
</style>