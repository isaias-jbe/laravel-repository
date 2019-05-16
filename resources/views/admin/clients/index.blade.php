<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 13/04/19
 * Time: 19:45
 */
?>
@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>
        <a href="{{ route('clients.create') }}" class="link" title="Novo cliente"><i class="fa fa-plus-circle"></i></a>
        Cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Clientes</li>
    </ol>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Clientes cadastrados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>
                                    <a href="{{ route('clients.edit', $client->id) }}" class="badge bg-yellow"><i class="fa fa-edit"> editar</i></a>
                                    <a href="{{ route('clients.show', $client->id) }}" class="badge bg-blue"><i class="fa fa-eye"> detalhes</i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- Paginação -->
                    @if (isset($filters))
                        {!! $clients->appends($filters)->links() !!}
                    @else
                        {!! $clients->links() !!}
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
