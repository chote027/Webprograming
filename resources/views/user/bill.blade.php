@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-8 col-md-7" style="padding-left:3rem">
        <div class="card bg-light mb-3">
            <div class="card-body">
                <h1 class="card-title">ห้องที่ {{$rn}}</h1>
                <h3 class="card-text">ชื่อผู้เช่า {{$owner_name}}</h3>
            </div>
            <div class="card-footer bg-light">
                <h5 class="card-text">ค่าห้องเดือนนี้ {{$total_cost}} บาท</h5>
            </div>
        </div>
    </div>
</div>
</div>
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