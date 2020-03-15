<?php

namespace App\DataTables;

use App\Models\Patient;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PatientsDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('action', function($row) {
                return '<a href="'.route('patients.show', $row->id).'" class="btn btn-sm btn-dark">Open</a>';
            });
    }

    public function query(Patient $model)
    {
        return $model->leftJoin('users', 'patients.user_id', '=', 'users.id')->select([
            'patients.id',
            'patients.user_id',
            'users.name',
            'users.email',
            'users.password',
            'users.phone',
            'users.gender',
            'users.dob',
            'patients.created_at',
            'patients.updated_at',
        ]);
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('patients-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->buttons(['csv']);
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id', 'title' => 'Patient ID'],
            ['data' => 'name', 'title' => 'Name'],
            ['data' => 'gender', 'title' => 'Gender'],
            ['data' => 'dob', 'title' => 'Birth Date'],
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return strtolower(config('app.name')).'_export_patients_' . date('YmdHis');
    }
}
