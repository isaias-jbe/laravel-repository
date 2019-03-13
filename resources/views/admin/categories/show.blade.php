@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
    <h1>
        Detalhes da categorias
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i>Categorias</a></li>
        <li class="active">Detalhes</li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Detalhes da Categoria</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <p>{{ $category->id }}</p>
            <p>{{ $category->title }}</p>
            <p>{{ $category->url }}</p>
            <p>{{ $category->description }}</p>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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