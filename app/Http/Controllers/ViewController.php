<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appointment_list = Appointment::all()->toArray();
        return view('view.index', compact('appointment_list'));
    }

}
