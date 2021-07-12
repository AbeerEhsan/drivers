<?php

namespace App\DataTables;

use App\Models\StudentInfo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class StudentInfoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'student_infos.datatables_actions')
        
        ->editColumn('student_id', function (StudentInfo $student) {
            return $student->student->name;
        })
       
        ->rawColumns(['action', 'student_id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StudentInfo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StudentInfo $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $url = "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json";

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'الاجراءات'])
            ->parameters([
                'language' => [
                    'url' => $url,
                ],
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'student_id' =>['title' => 'الطالب'],
            'rate'  => ['title' => 'المعدل'],
            'level' => ['title' => 'المستوى']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'student_infos_datatable_' . time();
    }
}
