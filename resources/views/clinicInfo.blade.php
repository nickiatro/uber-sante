@extends('layouts.app')

<?php

use Illuminate\Support\Facades\DB;

if(!isset($_SESSION)){
        session_start();
    }

?>
<!doctype html>
<html>

<body>
<?php

$clinic_id = 0;

$Medistat = $Super = $Alpha = $Diamant = $MediSys = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (($_POST["clinic_id"]) == "1") {
        $Medistat = "selected";
    }
    else if (($_POST["clinic_id"]) == "2") {
        $Super = "selected";
    }
    else if (($_POST["clinic_id"]) == "3") {
        $Alpha = "selected";
    }

    else if (($_POST["clinic_id"]) == "4") {
        $Diamant = "selected";
    }


    else if (($_POST["clinic_id"]) == "5") {
        $MediSys = "selected";
    }

}

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
else if ($MediSys == "selected"){
    $clinic_id = 5;
}


if (array_key_exists("assign-button", $_POST)) {

    if (DB::table('clinic')->where('physicianNumber','=', Auth::guard('physician')->user()->physicianNumber)->count() > 0) {
        DB::table('clinic')->where('physicianNumber','=', Auth::guard('physician')->user()->physicianNumber)->delete();
        
     }

    DB::table('clinic')->insert([
        'clinic_id' => $clinic_id,
        'physicianNumber' => Auth::guard('physician')->user()->physicianNumber

    ]);
    header("Location: /clinicInfo");
    exit;
}

?>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Select Clinic') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('assignPhysicianToClinic')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Clinic') }}</label>

                            <div class="col-md-6">
                                <select id="clinic_id" class="form-control" 
                                name="clinic_id" required>
                                    <option value="1"<?php echo $Medistat;?>>Medistat</option>
                                    <option value="2"<?php echo $Super;?>>Super-Clinic</option>
                                    <option value="3"<?php echo $Alpha;?>>Alpha Clinic</option>
                                    <option value="4"<?php echo $Diamant;?>>Diamant Clinic</option>
                                    <option value="5"<?php echo $MediSys;?>>MediSys</option>
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

<?php

$countPhysician1 = DB::table('clinic')->where('physicianNumber','!=',null)->where('clinic_id','=',1)->count();
$countNurse1 = DB::table('clinic')->where('accessId','!=',null)->where('clinic_id','=',1)->count();

$countPhysician2 = DB::table('clinic')->where('physicianNumber','!=',null)->where('clinic_id','=',2)->count();
$countNurse2 = DB::table('clinic')->where('accessId','!=',null)->where('clinic_id','=',2)->count();

$countPhysician3 = DB::table('clinic')->where('physicianNumber','!=',null)->where('clinic_id','=',3)->count();
$countNurse3 = DB::table('clinic')->where('accessId','!=',null)->where('clinic_id','=',3)->count();

$countPhysician4 = DB::table('clinic')->where('physicianNumber','!=',null)->where('clinic_id','=',4)->count();
$countNurse4 = DB::table('clinic')->where('accessId','!=',null)->where('clinic_id','=',4)->count();

$countPhysician5 = DB::table('clinic')->where('physicianNumber','!=',null)->where('clinic_id','=',5)->count();
$countNurse5 = DB::table('clinic')->where('accessId','!=',null)->where('clinic_id','=',5)->count();


?>

<div class="container" style= "padding:20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flip">{{ __('Medistat Clinic') }}</div>

                    <div class="card-body panel" style="display: none">
                        @csrf

                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of physicians:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countPhysician1 ?>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of nurses:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countNurse1 ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <div>
        </div>
    </div>
</div>
<div class="container" style= "padding:20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flip">{{ __('Super Clinic') }}</div>

                    <div class="card-body panel" style="display: none">
                        @csrf

                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of physicians:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countPhysician2 ?>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of nurses:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countNurse2 ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <div>
        </div>
    </div>
</div>
<div class="container" style= "padding:20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flip">{{ __('Alpha Clinic') }}</div>

                    <div class="card-body panel" style="display: none">
                        @csrf

                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of physicians:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countPhysician3 ?>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of nurses:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countNurse3 ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <div>
        </div>
    </div>
</div>
<div class="container" style= "padding:20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flip">{{ __('Diamant Clinic') }}</div>

                    <div class="card-body panel" style="display: none">
                        @csrf

                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of physicians:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countPhysician4 ?>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of nurses:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countNurse4 ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <div>
        </div>
    </div>
</div>
<div class="container" style= "padding:20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flip">{{ __('MediSys Clinic') }}</div>

                    <div class="card-body panel" style="display: none">
                        @csrf

                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of physicians:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countPhysician5 ?>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Number of nurses:') }}</label>

                            <div class="col-md-6">
                            <?php echo $countNurse5 ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <div>
        </div>
    </div>
</div>
</body>
@endsection
</html>