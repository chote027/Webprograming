@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Room Number') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/addroom') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="room_no" class="col-md-4 col-form-label text-md-right">{{ __('Room Number') }}</label>

                            <div class="col-md-6">
                                <input id="room_no" type="text" class="form-control @error('room_no') is-invalid @enderror" name="room_no" value="{{ old('room_no') }}" maxlength="10" required autocomplete="room_no" autofocus>

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
                                    {{ __('Add') }}
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
