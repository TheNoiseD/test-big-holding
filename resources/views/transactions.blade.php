@extends('layouts.app')
@section('styles')
@endsection
@section('content')
    <div class="container">
        <div class="card card-bienvenido">
            <div class="card-body">
                <h1 class="text-center">Transactions</h1>
                    {{ $dataTable->table() }}
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {{ $dataTable->scripts() }}
@endsection
