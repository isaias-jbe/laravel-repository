<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 13/04/19
 * Time: 19:45
 */
?>
@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        <a href="{{ route('users.create') }}" class="link" title="Novo usuário"><i class="fa fa-plus-circle"></i></a>
        Usuários
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuários</li>
    </ol>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Usuários cadastrados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="badge bg-yellow"><i class="fa fa-edit"> editar</i></a>
                                    <a href="{{ route('users.show', $user->id) }}" class="badge bg-blue"><i class="fa fa-eye"> detalhes</i></a>
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
                        {!! $users->appends($filters)->links() !!}
                    @else
                        {!! $users->links() !!}
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
