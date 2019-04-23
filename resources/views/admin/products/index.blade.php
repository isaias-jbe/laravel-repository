<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 13/04/19
 * Time: 19:45
 */
?>
@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>
        <a href="{{ route('products.create') }}" class="link" title="Novo produto"><i class="fa fa-plus-circle"></i></a>
        Produtos
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Produtos</li>
    </ol>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Filtros de Busca</h3>
                    <small><a href="{{ route('products.index') }}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Limpar Filtros</a></small>
                </div>
                <div class="box-body">
                    <form class="form-inline" action="{{ route('products.search') }}" method="post">
                        @csrf
                        <select name="category" class="form-control">
                            <option value="">Categoria</option>
                            @foreach($categories as $id => $category)
                                <option value="{{ $id }}"
                                @if(isset($filters['category']) && $filters['category'] == $id) selected @endif>{{ $category }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="name" class="form-control" placeholder="Nome..." value="{{ $filters['name'] ?? '' }}">
                        <input type="text" name="price" class="form-control" placeholder="Preço..."  value="{{ $filters['price'] ?? '' }}">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.alerts')

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Categorias cadastradas</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Url</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>{{ $product->url }}</td>
                                <td>R$: {{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="badge bg-yellow"><i class="fa fa-edit"> editar</i></a>
                                    <a href="{{ route('products.show', $product->id) }}" class="badge bg-blue"><i class="fa fa-eye"> detalhes</i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Url</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- Paginação -->
                    @if (isset($filters))
                        {!! $products->appends($filters)->links() !!}
                    @else
                        {!! $products->links() !!}
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
