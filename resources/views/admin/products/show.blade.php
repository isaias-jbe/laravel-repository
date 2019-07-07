@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
    <h1>
        Detalhes do produto
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}"><i class="fa fa-list"></i>Produtos</a></li>
        <li class="active">Detalhes</li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Detalhes do Produto</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <p><b>Id:</b> {{ $product->id }}</p>
            <p><b>Nome:</b> {{ $product->name }}</p>
            <p><b>Categoria:</b> {{ $product->category->title }}</p>
            <p><b>Preço:</b> R$: {{ $product->price }}</p>
            <p><b>Url:</b> {{ $product->url }}</p>
            <p><b>Descrição:</b> {{ $product->description }}</p>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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
