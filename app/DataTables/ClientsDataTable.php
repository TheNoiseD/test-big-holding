<?php

namespace App\DataTables;

use App\Models\User;
use App\Repositories\RequestHttp;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\CollectionDataTable;

class ClientsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param RequestHttp $request
     * @return CollectionDataTable
     * @throws GuzzleException
     */
    public function dataTable(RequestHttp $request): CollectionDataTable
    {
        $response=$request->get('users/{token}');
        $collection = collect(json_decode($response->getBody()->getContents()));

        return (new CollectionDataTable($collection))
            ->addColumn('action', function ($user) {
                return '<a href="show?id='.$user->user_id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye"></i> Ver</a>';
            });
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->language(['url' => '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json',])
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"header-actions d-flex justify-content-between "l<" ps-xl-75 ps-0"<"dt-action-buttons d-flex justify-content-end align-items-center break-450"<"me-1"f>B>>>t<"d-flex justify-content-between mx-2 row mb-1"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>')
                    ->orderBy(9, 'desc')
                    ->selectStyleSingle()
                    ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array

    {
        $cols=[
            'id',
            'user_id',
            'state_user_id',
            'segmentation_id',
            'identification_type_id',
            'identification_number',
            'mobile_number',
            'program_id',
            'active',
            'created_at',
            'updated_at',
            'action'
        ];
        $make = [];
        foreach ($cols as $col) {
            $make[] = Column::make($col);
        }
        return (array) $make;
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
