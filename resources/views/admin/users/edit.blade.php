@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
    <h1>Editar Usuários</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('users.index') }}"><i class="fa fa-list"></i>Usuários</a></li>
        <li class="active">Editar</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $title }} {{ $user->name ?? "" }}</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" action="{{ route('users.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @includeIf('admin.users.partials.form')
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
