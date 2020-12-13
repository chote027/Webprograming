@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="page-section-heading text-center text-uppercase text-black mb-0">Apartment GO</h2>
    <form class="form-inline mr-auto" action="{{ url('/search') }}">
        @csrf
        <input name="apartment_address" class="form-control mr-sm-2" type="text" placeholder="Searching for Apartment" aria-label="Search">
        <button class="btn btn-primary btn-rounded btn-sm my-0" type="submit">Search</button>
    </form>
    <div class="divider-custom">
    </div>
    <div class="row row-cols-3 ">
        @foreach($user as $u)
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card" style="width: 22rem;">
                <div class="portfolio-item mx-auto" style="width: 22rem; flex-flow: row wrap;" data-toggle="modal" data-target="#portfolioModal1">
                    <img class="img-fluid" src="{{asset('uploads/'.$u->image)}}" alt="" />
                    <div class="card-body" style="width: 22rem;">
                        <h5 class="card-title">{{$u->apartment_name}}</h5>
                        <p class="card-text" style="white-space: normal;">{{$u->apartment_desc}}</p>
                        <a href="{{url('/Detail/create',$u->id_no)}}" class="btn btn-primary">Show Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- </section> -->
@endsection

<style>
    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    @media (min-width: 992px) {
        .page-section .page-section-heading {
            font-size: 3rem;
            line-height: 2.5rem;
        }
    }

    .portfolio .portfolio-item {
        position: absolute;
        border: 1px groove rgba(26, 136, 183, 0.9);
    }

    /*
    .portfolio .portfolio-item {
        cursor: pointer;
        position: relative;
        display: block;
        max-width: 25rem;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .portfolio .portfolio-item .portfolio-item-caption {
        position: absolute;
        top: 0;
        left: 0;
        transition: all 0.2s ease-in-out;
        opacity: 0;
        background-color: rgba(26, 136, 183, 0.9);
    }

    .portfolio .portfolio-item .portfolio-item-caption:hover {
        opacity: 1;
    }

    .portfolio .portfolio-item .portfolio-item-caption .portfolio-item-caption-content {
        font-size: 1.5rem;
    }

    .portfolio-modal .portfolio-modal-title {
        font-size: 2.25rem;
        line-height: 2rem;
    }

    @media (min-width: 992px) {
        .portfolio-modal .portfolio-modal-title {
            font-size: 3rem;
            line-height: 2.5rem;
        }
    }

    .portfolio-modal .close {
        position: absolute;
        z-index: 1;
        right: 1.5rem;
        top: 1rem;
        font-size: 3rem;
        line-height: 3rem;
        color: #1abc9c;
        opacity: 1;
    } 
*/
    .divider-custom {
        margin: 1.25rem 0 1.5rem;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .divider-custom .divider-custom-line {
        width: 100%;
        max-width: 7rem;
        height: 0.25rem;
        background-color: #2c3e50;
        border-radius: 1rem;
        border-color: #2c3e50 !important;
    }

    .divider-custom .divider-custom-line:first-child {
        margin-right: 1rem;
    }

    .divider-custom .divider-custom-line:last-child {
        margin-left: 1rem;
    }

    .divider-custom .divider-custom-icon {
        color: #2c3e50 !important;
        font-size: 2rem;
    }

    .divider-custom.divider-light .divider-custom-line {
        background-color: #fff;
    }

    .divider-custom.divider-light .divider-custom-icon {
        color: #fff !important;
    }
</style>