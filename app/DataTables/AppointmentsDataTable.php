<?php

namespace App\DataTables;

use App\Models\Appointment;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AppointmentsDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
    }

    public function query(Appointment $model)
    {
        return $model->leftJoin('patients', 'appointments.patient_id', '=', 'patients.id')
                    ->leftJoin('users', 'patients.user_id', '=', 'users.id')
                    ->select([
                        'appointments.id',
                        'appointments.type',
                        'appointments.appointment_date',
                        'appointments.patient_id',
                        'users.name',
                        'users.email',
                        'users.phone',
                        'appointments.next_appointment_date',
                        'appointments.created_at',
                        'appointments.updated_at',
                    ]);
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('patient-appointments-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(['csv']);
    }

    protected function getColumns()
    {
        return [
            ['data' => 'appointment_date', 'title' => 'Date'],
            ['data' => 'type', 'title' => 'Type'],
            ['data' => 'name', 'title' => 'Name'],
            ['data' => 'email', 'title' => 'Email'],
            ['data' => 'phone', 'title' => 'Phone'],
            ['data' => 'next_appointment_date', 'title' => 'Next Appointment']
        ];
    }

    protected function filename()
    {
        return strtolower(config('app.name')).'_export_patient_appointments_' . date('YmdHis');
    }
}
