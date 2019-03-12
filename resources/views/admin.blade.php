@extends('layouts.app')

@section('content')
 @if (Auth::check())

                    @if (Auth::user()->admin_privilege == "1")

                          <?php
    $users = DB::table('users')->get();
    $physicians = DB::table('physicians')->get();
    $nurses = DB::table('nurses')->get();
 ?>
<h1>List of all the patients</h1>
<table class="table table-hover">

    <thead>

      <th>Email Address</th>

      <th>Password</th>
      
      <th>Health Card</th>

      <th>Birthday</th>

      <th>Gender</th>

      <th>Phone Number</th>

      <th>Country</th>

      <th>Province</th>

      <th>Postal Code</th>

      <th>City</th>

      <th>Street</th>

    </thead>

    <tbody>

@foreach($users as $user)



        <tr>

          <td>{{$user->email}} </td>

          <td>{{$user->password}} </td>

          <td>{{$user->healthCard}} </td>

          <td>{{$user->birthday}} </td>

          <td>{{$user->gender}} </td>

          <td>{{$user->phone}} </td>

          <td>{{$user->country}} </td>

          <td>{{$user->province}} </td>

          <td>{{$user->postalCode}} </td>

          <td>{{$user->city}} </td>

          <td>{{$user->street}} </td>

          @if ($user->admin_privilege == "1")
          <td>Yes </td>
        @else
        <td><a href = "{{route('user.update', ['user' => $user->id])}}">No</a> </td>
        @endif

        </tr>



        </tr>
        @endforeach
    </tbody>

</table>

<h1>List of all the physicians</h1>
<table class="table table-hover">

    <thead>

      <th>First Name</th>

      <th>Last Name</th>

      <th>Physician Number</th>

      <th>Password</th>
      
      <th>Specialty</th>

      <th>City</th>

    </thead>

    <tbody>

@foreach($physicians as $user)

        <tr>

          <td>{{$user->firstName}} </td>

          <td>{{$user->lastName}} </td>

          <td>{{$user->physicianNumber}} </td>

          <td>{{$user->password}} </td>

          <td>{{$user->specialty}} </td>

          <td>{{$user->city}} </td>

          @if ($user->admin_privilege == "1")
          <td>Yes </td>
        @else
        <td><a href = "{{route('user.update', ['user' => $user->id])}}">No</a> </td>
        @endif

        </tr>



        </tr>
        @endforeach
    </tbody>

</table>

<h1>List of all the nurses</h1>
<table class="table table-hover">

    <thead>

      <th>Access ID</th>

      <th>Password</th>

    </thead>

    <tbody>

@foreach($nurses as $user)

        <tr>

          <td>{{$user->accessId}} </td>

          <td>{{$user->password}} </td>

          @if ($user->admin_privilege == "1")
          <td>Yes </td>
        @else
        <td><a href = "{{route('user.update', ['user' => $user->id])}}">No</a> </td>
        @endif

        </tr>
        
        </tr>
        @endforeach
    </tbody>

</table>


                    @else 
                    <h1> You Are Not an Admin </h1>
                    @endif
                    @else
                    <h1> You Are Not Logged in</h1>
                    @endif

@endsection 