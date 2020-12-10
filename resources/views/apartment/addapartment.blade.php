@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Apartment Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/Apartment') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" maxlength="10" required autocomplete="tel" autofocus>

                                @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apartment_name" class="col-md-4 col-form-label text-md-right">{{ __('Apartment Name') }}</label>

                            <div class="col-md-6">
                                <input id="apartment_name" type="text" class="form-control @error('apartment_name') is-invalid @enderror" name="apartment_name" value="{{ old('apartment_name') }}" required autocomplete="apartment_name" autofocus>

                                @error('apartment_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_no" class="col-md-4 col-form-label text-md-right">{{ __('ID card number') }}</label>

                            <div class="col-md-6">
                                <input id="id_no" type="text" class="form-control @error('id_no') is-invalid @enderror" name="id_no" value="{{ old('id_no') }}" required autocomplete="id_no" maxlength="13" autofocus>

                                @error('id_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6 offset-md-2">
                                <div class="input-group">
                                    <!-- <div class="input-group-prepend">
                                        <span class="input-group-text" id="image">Apartment Image (jpg, png, jpeg)</span>
                                    </div> -->
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" aria-describedby="image" name="image" required>
                                        <label class="custom-file-label" for="image">Apartment Image (jpg, png, jpeg)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apartment_address" class="col-md-4 col-form-label text-md-right">{{ __('Apartment Address') }}</label>

                            <div class="col-md-6">
                                <input id="apartment_address" type="text" class="form-control @error('apartment_address') is-invalid @enderror" name="apartment_address" value="{{ old('apartment_address') }}" required autocomplete="apartment_address" autofocus>

                                @error('apartment_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apartment_desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="apartment_desc" type="text" class="form-control @error('apartment_desc') is-invalid @enderror" name="apartment_desc" value="{{ old('apartment_desc') }}" required autocomplete="apartment_desc" autofocus>

                                </textarea>

                                @error('apartment_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_room" class="col-md-4 col-form-label text-md-right">{{ __('Number of Aparment rooms') }}</label>

                            <div class="col-md-6">
                                <input id="no_room" type="text" class="form-control @error('no_room') is-invalid @enderror" name="no_room" value="{{ old('no_room') }}" required autocomplete="no_room" autofocus>

                                @error('no_room')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rent_month" class="col-md-4 col-form-label text-md-right">{{ __('Rent per month') }}</label>

                            <div class="col-md-6">
                                <input id="rent_month" type="text" class="form-control @error('rent_month') is-invalid @enderror" name="rent_month" value="{{ old('rent_month') }}" required autocomplete="rent_month" autofocus>

                                @error('rent_month')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room_no" class="col-md-4 col-form-label text-md-right">{{ __('First Room Number') }}</label>

                            <div class="col-md-6">
                                <input id="room_no" type="text" class="form-control @error('room_no') is-invalid @enderror" name="room_no" value="{{ old('room_no') }}" required autocomplete="room_no" autofocus>

                                @error('room_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Apartment') }}
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