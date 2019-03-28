@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Appointment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('appointment.updateAppointment', 'appointment') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="start_time" class="col-md-4 col-form-label text-md-right">{{ __('Start Time') }}</label>

                            <div class="col-md-6">
                                <input id="start_time" type="text" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" value="{{ old('start_time') }}" required>

                                @if ($errors->has('start_time'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration') }}</label>
                            <div class="col-md-6">
                                <select input id="duration" type="text" class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" value="{{ old('duration') }}" required>
                                <option value="20">walk-in (20 minutes)</option>
                                <option value="60">anunal checkup (60 minutes)</option>
                                </select>

                                @if ($errors->has('duration'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="physicianNumber" class="col-md-4 col-form-label text-md-right">{{ __('Physician Number') }}</label>

                            <div class="col-md-6">
                                <input id="physicianNumber" type="text" class="form-control{{ $errors->has('physicianNumber') ? ' is-invalid' : '' }}" name="physicianNumber" value="{{ old('physicianNumber') }}" required>

                                @if ($errors->has('physicianNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physicianNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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