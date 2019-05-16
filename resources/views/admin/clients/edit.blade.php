@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
        <h1>Editar Cliente</h1>
        <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('clients.index') }}"><i class="fa fa-list"></i>Clientes</a></li>
        <li class="active">Editar</li>
        </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $title }} {{ $client->name ?? "" }}</h3>
                </div>
                <!-- /.box-header -->
                <form role="form" action="{{ route('clients.update', $client->id) }}" method="POST">
                    @method('PUT')
                    @includeIf('admin.clients.partials.form')
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
