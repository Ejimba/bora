@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card text-white bg-secondary">
                                    <div class="card-header">Patients</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $statistics->patient_count }}</h5>
                                        <p class="card-text">Total Patients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card text-white bg-success">
                                    <div class="card-header">Appointments</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $statistics->appointment_count }}</h5>
                                        <p class="card-text">Total Appointments</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
