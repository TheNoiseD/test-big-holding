<?php

namespace App\Http\Controllers;

use App\DataTables\ClientsDataTable;
use App\DataTables\ClientTransactionsDataTable;
use App\Repositories\RequestHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{

    protected RequestHttp $requestHttp;

    public function __construct(RequestHttp $requestHttp)
    {
        $this->requestHttp=$requestHttp;
    }

    public function index(ClientsDataTable $dataTable)
    {
        return $dataTable->render('home');
    }

    public function show(ClientTransactionsDataTable $dataTable)
    {
        return $dataTable->render('transactions');
    }
}
