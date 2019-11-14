@extends('layouts.backend')

@section('title', 'Patient Details')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Patient Details</div>
                    <div class="card-body">
                        <h4>Demographic Information</h4>
                        <hr>
                        <form method="POST" action="{{ route('patients.update', $patient->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $patient->user->name }}" required autofocus>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $patient->user->email }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $patient->user->phone }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="" {{ $patient->user->gender == '' ? 'selected':'' }}></option>
                                        <option value="male" {{ $patient->user->gender == 'male' ? 'selected':'' }}>Male</option>
                                        <option value="female" {{ $patient->user->gender == 'female' ? 'selected':'' }}>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dob">Birth Date</label>
                                    <input type="date" class="form-control" name="dob" id="dob" value="{{ $patient->user->dob }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <h4>Appointments</h4>
                        <hr>
                        @if (count($patient->appointments))
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <td>Appointment Date</td>
                                    <td>Type</td>
                                    <td>Next Appointment Date</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patient->appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>{{ $appointment->type }}</td>
                                        <td>{{ $appointment->next_appointment_date }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>No appointments found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

