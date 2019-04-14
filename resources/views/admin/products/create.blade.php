@extends('adminlte::page')

@section('title', 'Produto')

@section('content_header')
    @if ( isset($product) )
        <h1>Editar Produto</h1>
        <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}"><i class="fa fa-list"></i>Produtos</a></li>
        <li class="active">Editar</li>
        </ol>
    @else
        <h1>Novo Produto</h1>
        <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}"><i class="fa fa-list"></i>Produtos</a></li>
        <li class="active">Cadastro</li>
        </ol>
    @endif
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

                @if ( isset($product) )
                    <!-- form edit start -->
                    <form role="form" action="{{ route('products.update', $product->id) }}" method="POST">
                        @method('PUT')
                @else
                    <!-- form create start -->
                    <form role="form" action="{{ route('products.store') }}" method="POST">
                @endif
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title">Nome:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?? old('name') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="url">Categoria:</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Selecione</option>
                                        @foreach($categories as $id => $category)
                                            <option value="{{ $id }}"
                                                    @if(isset($product->category_id) && $id == $product->category_id) selected @endif
                                            >{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="url">URL:</label>
                                    <input type="text" class="form-control" id="url" name="url" value="{{ $product->url ?? old('url') }}">
                                </div>
                            </div>

                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label for="url">Preço:</label>
                                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price ?? old('price') }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $product->description ?? old('description') }}</textarea>
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
