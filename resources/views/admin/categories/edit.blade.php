@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i>Categorias</a></li>
        <li class="active">Editar</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $title }} {{ $category->name ?? "" }}</h3>
                </div>
                <!-- /.box-header -->

                <form role="form" action="{{ route('categories.update', $category->id) }}" method="POST">
                    @method('PUT')
                    @includeIf('admin.categories.partials.form')
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
