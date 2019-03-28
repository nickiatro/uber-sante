<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-center {
		text-align: center;
                position: absolute;
                height: 70%;
		width:100%;
            }
 	    .middle-center {
		text-align: center;
                position: relative;
                height: 70%;
		width:100%;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
		text-align: center;
                color: #636b6f;
                padding: 0 30px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }

            .links > a.b {
		text-align: center;
                color: #636b6f;
                padding: 0 30px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
       

            @if (Route::has('login'))
                <div class="top-center links">
                    @auth
                <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                </a>
                                

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

			<div class="middle-center links"></div>

			<div class="links">
				<a href="patient-create-appointment"> Book Appointment</a>
			</div>
			<div class="links">
				<a href="addToCart"> Appointment Cart</a>
            @if (Auth::user()->physician_privilege == "1")
            <div class="links">
				<a href="view">My Availabilities</a>
			</div>
            @endif

			</div>
                	<div class="links">
				<a href="view">My Appointments</a>
			</div>

                    @else
                        <div class="links">
				<a href="{{ route('login') }}">Login</a>
			</div>

                        @if (Route::has('register'))

                        <div class="links"><a href="{{ route('register') }}">Register</a></div>
				<div class="middle-center links">
                           		<div class="links">
						<a href="{{ route('createPhysician') }}" class="b">Create Physician</a>
					</div>
                            		<div class="links">
						<a href="{{ route('createNurse') }}" class="b">Create Nurse</a>
					</div>
				</div>
                        @endif
                    @endauth

			<div class="top-center links">

               			<div class="links">
					<a href="help">Help</a>
				</div>
			</div>
                </div>

	

            @endif

            <div class="content">
                <div class="title m-b-md">
                    SOEN 344 Team 20 - Uber Santé
                </div>

                <div class="links">
                    @if (Auth::check())

                        @if (Auth::user()->admin_privilege == "1")

                         <a href="/admin">Admin panel</a>

                        @endif
                        @endif
                </div>
            </div>
        </div>        
    </body>
</html>
