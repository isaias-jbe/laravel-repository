@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    @if ( isset($category) )
        <h1>Editar Categoria</h1>
        <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i>Categorias</a></li>
        <li class="active">Editar</li>
        </ol>
    @else
        <h1>Nova Categoria</h1>
        <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i>Categorias</a></li>
        <li class="active">Cadastro</li>
        </ol>
    @endif
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $title }} {{ $category->title ?? "" }}</h3>
                </div>
                <!-- /.box-header -->
               
                @include('admin.includes.alerts')

                @if ( isset($category) )
                    <!-- form edit start -->
                    <form role="form" action="{{ route('categories.update', $category->id) }}" method="POST">
                        @method('PUT')
                @else
                    <!-- form create start -->
                    <form role="form" action="{{ route('categories.store') }}" method="POST">
                @endif
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title ?? old('title') }}">
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="url">URL</label>--}}
                            {{--<input type="text" class="form-control" id="url" name="url" value="{{ $category->url ?? old('url') }}">--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $category->description ?? old('description') }}</textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
    
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
