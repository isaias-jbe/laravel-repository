@extends('adminlte::page')

@section('title', 'Produto')

@section('content_header')
    <h1>Editar Produto</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}"><i class="fa fa-list"></i>Produtos</a></li>
        <li class="active">Editar</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $title }} {{ $product->title ?? "" }}</h3>
                </div>
                <!-- /.box-header -->
               
                @include('admin.includes.alerts')
                <form role="form" action="{{ route('products.update', $product->id) }}" method="POST">
                    @method('PUT')
                    @includeIf('admin.products.partials.form')
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
