<?php

namespace App\DataTables;

use App\Models\Bus;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BusDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'buses.datatables_actions')

            ->editColumn('user_id', function (Bus $bus) {
                return $bus->user->name;
            })
            ->editColumn('status', function (Bus $bus) {
              if ($bus->status == 'free') {
                return 'متاح';
              }else{
                return 'مشغول';}
            })
            ->rawColumns(['action', 'status', 'user_id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Bus $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Bus $model)
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
            'name' => ['title' => 'اسم الباص'],
            'user_id'=>[ 'title'=> 'اسم السائق'],
            'status' => ['title' => 'الحالة'],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'buses_datatable_' . time();
    }
}
