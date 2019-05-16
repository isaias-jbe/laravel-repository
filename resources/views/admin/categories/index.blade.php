@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>
        <a href="{{ route('categories.create') }}" class="link" title="Nova categoria"><i class="fa fa-plus-circle"></i></a>
        Categorias
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categorias</li>
    </ol>
@stop

@section('content')

{{--<div class="row">--}}
  {{--<div class="col-md-12">--}}
    {{--<div class="box box-primary">--}}
      {{--<div class="box-header">--}}
          {{--<h3 class="box-title">Filtros de Busca</h3>--}}
          {{--<small><a href="{{ route('categories.index') }}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Limpar Filtros</a></small>--}}
      {{--</div>--}}
      {{--<div class="box-body">--}}
        {{--<form action="{{ route('categories.search') }}" method="post" class="form-inline">--}}
            {{--@csrf--}}
            {{--<input type="text" name="title" class="form-control" value="{{ $data['title'] ?? "" }}" placeholder="Titulo" >--}}
            {{--<input type="text" name="url" class="form-control" value="{{ $data['url'] ?? "" }}" placeholder="URL" >--}}
            {{--<input type="text" name="description" class="form-control" value="{{ $data['description'] ?? "" }}" placeholder="Descrição">--}}

            {{--<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
          {{--</form>--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</div>--}}
{{--</div>--}}

@include('admin.includes.alerts')

<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Categorias cadastradas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="badge bg-yellow"><i class="fa fa-edit"> editar</i></a>
                                <a href="{{ route('categories.show', $category->id) }}" class="badge bg-blue"><i class="fa fa-eye"> detalhes</i></a>
                            </td>
                        </tr>
                    @endforeach       
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
              </table>
              @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
              @else
                {!! $categories->links() !!}
              @endif              
        </div>
        <!-- /.box-body -->
      </div>      
      <!-- /.box -->
    </div>
  </div>
@stop
