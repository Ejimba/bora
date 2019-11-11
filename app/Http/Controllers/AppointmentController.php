<?php

namespace App\Http\Controllers;

use App\DataTables\AppointmentsDataTable;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(AppointmentsDataTable $dataTable)
    {
        return $dataTable->render('appointments.index');
    }
}
