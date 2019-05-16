@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
    <h1>
        Detalhes do cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('clients.index') }}"><i class="fa fa-list"></i>clientes</a></li>
        <li class="active">Detalhes</li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Detalhes do Cliente</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <p><b>Id:</b> {{ $client->id }}</p>
            <p><b>Nome:</b> {{ $client->name }}</p>
            <p><b>Email:</b> {{ $client->email }}</p>
            <p><b>Telefone:</b> {{ $client->phone }}</p>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Excluir</button>
            </form>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
@stop
