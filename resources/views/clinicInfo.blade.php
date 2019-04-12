@extends('layouts.app')

@section('content')

<?php

$clinic_id = 0;

$Medistat = $Super = $Alpha = $Diamant = $MediSys = "";

if ($Medistat == "selected"){
    $clinic_id = 1;
}
else if ($Super == "selected"){
    $clinic_id = 2;
}
else if ($Alpha == "selected"){
    $clinic_id = 3;
}
else if ($Diamant == "selected"){
    $clinic_id = 4;
}
else if ($Medistat == "selected"){
    $MediSys = 5;
}


if (array_key_exists("assign-button", $_POST)) {
    DB::table('clinic')->insert([
        'clinic_id' => $clinic_id,
        'physicianNumber' => Auth::guard('physician')->user()->physicianNumber,
    ]);
    exit;
}

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Select Clinic') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('assignPhysicianToClinic') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Clinic') }}</label>

                            <div class="col-md-6">
                                <select input id="clinic_id" type="text" class="form-control{{ $errors->has('clinic_id') ? ' 
                                is-invalid' : '' }}" name="clinic_id" value="{{ old('clinic_id') }}" required>
                                    <option value=1<?php echo $Medistat;?>>Medistat</option>
                                    <option value=2<?php echo $Super;?>>Super-Clinic</option>
                                    <option value=3<?php echo $Alpha;?>>Alpha Clinic</option>
                                    <option value=4<?php echo $Diamant;?>>Diamant Clinic</option>
                                    <option value=5<?php echo $MediSys;?>>MediSys</option>
                                </select>

                                @if ($errors->has('clinic_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('clinic_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="assign-button" id="assign-button" class="btn btn-primary">
                                    {{ __('Assign to Clinic') }}
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