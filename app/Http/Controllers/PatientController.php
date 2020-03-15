<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\DataTables\PatientsDataTable;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(PatientsDataTable $dataTable)
    {
        return $dataTable->render('patients.index');
    }

    public function show($id, Request $request)
    {
        $patient = Patient::with(['user', 'appointments'])->find($id);
        if (!$patient) {
            return redirect(route('patients.index'))->with('error', 'Patient not found!');
        }
        return view('patients.show', compact('patient'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(PatientStoreRequest $request)
    {
        $user = User::create($request->only((new User)->getFillable()));
        $patient = Patient::create(array_merge($request->only((new Patient)->getFillable()), ['user_id' => $user->id]));
        return redirect(route('patients.show', $patient->id))->with('success', 'Patient created successfully!');
    }

    public function update($id, PatientUpdateRequest $request)
    {
        $patient = Patient::with('user')->find($id);
        if (!$patient) {
            return redirect(route('patients.index'))->with('error', 'Patient not found!');
        }
        $user = $patient->user;
        $user->update($request->only((new User)->getFillable()));
        $patient->update(array_merge($request->only((new Patient)->getFillable()), ['user_id' => $user->id]));
        return redirect(route('patients.show', $patient->id))->with('success', 'Patient updated successfully!');
    }
}
