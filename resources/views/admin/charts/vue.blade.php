<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 01/05/19
 * Time: 21:41
 */
?>
@extends('adminlte::page')

@section('title', 'Relatório mensal de vendas')

@section('content_header')
    <h1>Relatório mensal de vendas</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Vue.js</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Gráficos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <reports-months></reports-months>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    #footer
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop

@push('js')
<script src="{{ url('js/app.js') }}"></script>
@endpush
