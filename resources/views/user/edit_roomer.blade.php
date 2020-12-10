@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-light mb-3">
                <div class="card-header text-white bg-primary mb-3">{{ __('Add/Edit Roomer') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.update',$data[0]->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="room_no" class="col-md-4 col-form-label text-md-right">{{ __('Room Number') }}</label>

                            <div class="col-md-6">
                                <input id="room_no" type="text" class="form-control @error('room_no') is-invalid @enderror" name="room_no" value="{{ $data[0]->room_no }}" maxlength="10" required autocomplete="room_no" autofocus>

                                @error('room_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room_owner_fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="room_owner_fname" type="text" class="form-control @error('room_owner_fname') is-invalid @enderror" name="room_owner_fname" value="{{ $data[0]->room_owner_fname }}" required autocomplete="room_owner_fname" autofocus>

                                @error('room_owner_fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room_owner_lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="room_owner_lname" type="text" class="form-control @error('room_owner_lname') is-invalid @enderror" name="room_owner_lname" value="{{ $data[0]->room_owner_lname }}" required autocomplete="room_owner_lname" autofocus>

                                @error('room_owner_lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Telephone Number') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ $data[0]->tel }}" required autocomplete="tel" maxlength="10" autofocus>

                                @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room_owner_id_no" class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>

                            <div class="col-md-6">
                                <input id="room_owner_id_no" type="text" class="form-control @error('room_owner_id_no') is-invalid @enderror" name="room_owner_id_no" value="{{ $data[0]->room_owner_id_no }}" required autocomplete="room_owner_id_no" maxlength="13" autofocus>

                                @error('room_owner_id_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rent_month" class="col-md-4 col-form-label text-md-right">{{ __('Rent per month') }}</label>

                            <div class="col-md-6">
                                <input id="rent_month" type="text" class="form-control @error('rent_month') is-invalid @enderror" name="rent_month" value="{{ $data[0]->rent_month }}" required autocomplete="rent_month" autofocus>

                                @error('rent_month')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="elect" class="col-md-4 col-form-label text-md-right">{{ __('Electric cost') }}</label>

                            <div class="col-md-6">
                                <input id="elect" type="text" class="form-control @error('elect') is-invalid @enderror" name="elect" value="{{ $data[0]->elect_cost }}" required autocomplete="elect" autofocus>

                                @error('elect')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="water" class="col-md-4 col-form-label text-md-right">{{ __('Water cost') }}</label>

                            <div class="col-md-6">
                                <input id="water" type="text" class="form-control @error('water') is-invalid @enderror" name="water" value="{{ $data[0]->water_cost }}" required autocomplete="water" autofocus>

                                @error('water')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="others" class="col-md-4 col-form-label text-md-right">{{ __('Others Cost') }}</label>

                            <div class="col-md-6">
                                <input id="others" type="text" class="form-control @error('others') is-invalid @enderror" name="others" value="{{ $data[0]->others }}" required autocomplete="others" autofocus>

                                @error('others')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="roomate" class="col-md-4 col-form-label text-md-right">{{ __('Room mate') }}</label>

                            <div class="col-md-6">
                                <input id="roomate" type="text" class="form-control @error('roomate') is-invalid @enderror" name="roomate" value="{{ $data[0]->roomate }}" required autocomplete="roomate" autofocus>

                                @error('roomate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add/Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection