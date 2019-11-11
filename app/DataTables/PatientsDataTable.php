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
        return $model->with('user')->select(['users.*', 'patients.*']);
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('patients-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(['csv']);
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id', 'title' => 'Patient ID'],
            ['data' => 'user.name', 'title' => 'Name'],
            ['data' => 'user.gender', 'title' => 'Gender'],
            ['data' => 'user.dob', 'title' => 'Birth Date'],
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
