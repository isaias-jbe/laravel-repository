<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 01/05/19
 * Time: 12:53
 */
?>
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
