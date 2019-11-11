<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $statistics = new stdClass();
        $statistics->patient_count = Patient::count();
        $statistics->appointment_count = Appointment::count();
        return view('dashboard.index', compact('statistics'));
    }
}
