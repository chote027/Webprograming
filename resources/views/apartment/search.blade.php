@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Apartment GO</h2>
    <div class="divider-custom">
    </div>
    @if(!empty($place))
    @if(count($place) > 0)
    <div class="row row-cols-3 ">
        @foreach($place as $u)
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card" style="width: 22rem;">
                <div class="portfolio-item mx-auto" style="width: 22rem; flex-flow: row wrap;" data-toggle="modal" data-target="#portfolioModal1">
                    <img class="img-fluid" src="{{asset('uploads/'.$u->image)}}" alt="" />
                    <div class="card-body" style="width: 22rem;">
                        <h5 class="card-title">{{$u->apartment_name}}</h5>
                        <p class="card-text" style="white-space: normal;">{{$u->apartment_desc}}</p>
                        <a href="{{url('/Detail/create',$u->apartment_name)}}" class="btn btn-primary">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="alert alert-danger" role="alert">No Data Found</dev>
        @endif
        @endif
    </div>
</div>
@endsection