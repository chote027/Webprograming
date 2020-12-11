@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        @foreach($room_data as $rd)
        <div class="card bg-light mb-3">
            <div class="card-body">
                <h1 class="card-title">Room {{$rd->room_no}}</h1>
                <table class="table table-bordered" style="margin-top: 2rem;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Activities</th>
                            <th scope="col">Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">{{$rd->room_owner_fname}}</td>
                            <td>Rent per Month</td>
                            <td>{{$rd->rent_month}}</td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td>Electricity cost</td>
                            <td>{{$rd->elect_cost}}</td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td>Water cost</td>
                            <td>{{$rd->water_cost}}</td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td>Others</td>
                            <td>{{$rd->others}}</td>
                        </tr>
                        <tr>
                            <td scope="row">Total cost</td>
                            <td></td>
                            <td>{{$total_cost}} Baht</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-light text-center">
                <a href="{{ url('/home') }}" class="btn btn-primary">Send</a>
            </div>
            <!-- ภาษาไทย  
                <h1 class="card-title">ห้องที่ {{$rd->room_no}}</h1>
                <table class="table table-bordered" style="margin-top: 2rem;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">ชื่อผู้เช่า</th>
                            <th scope="col">หมายเหตุ</th>
                            <th scope="col">ค่าเช่า</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">{{$rd->room_owner_fname}}</td>
                            <td>ค่าห้องต่อเดือน</td>
                            <td>{{$rd->rent_month}}</td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td>ค่าไฟ</td>
                            <td>{{$rd->elect_cost}}</td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td>ค่าน้ำ</td>
                            <td>{{$rd->water_cost}}</td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td>อื่นๆ</td>
                            <td>{{$rd->others}}</td>
                        </tr>
                        <tr>
                            <td scope="row">ทั้งหมด</td>
                            <td></td>
                            <td>{{$total_cost}} Baht</td>
                        </tr>
                    </tbody>
                </table> -->
        </div>
        @endforeach
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
        color: #086CFC;
    }

    /* table.center {
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
    } */
</style>