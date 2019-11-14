@extends('layouts.backend')

@section('title', 'Patients')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Patients
                        <div class="float-right">
                            <a href="{{ route('patients.create') }}" class="btn btn-sm btn-primary">Add New Patient</a>
                            <a href="#" class="btn btn-sm btn-success" id="export-button">Export</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        $('#export-button').click(function(){
            $(".buttons-csv").click();
        });
    </script>
@endpush
