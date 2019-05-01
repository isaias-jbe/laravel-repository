@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Nova Categoria</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i>Categorias</a></li>
        <li class="active">Cadastro</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <!-- /.box-header -->
               
                @include('admin.includes.alerts')

                <form role="form" action="{{ route('categories.store') }}" method="POST">
                    @includeIf('admin.categories.partials.form')
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
