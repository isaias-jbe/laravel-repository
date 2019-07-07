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

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nome da Categoria:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-gear"></i>
                    </div>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name ?? old('name') }}">
                </div>
                @if($errors->has('name'))
                    <span class="help-block">
                   <strong>{{ $errors->first('name') }}</strong>
               </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Descrição da Categoria</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-sort-alpha-asc"></i>
                    </div>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $category->description ?? old('description') }}</textarea>
                </div>
                @if($errors->has('description'))
                    <span class="help-block">
                   <strong>{{ $errors->first('description') }}</strong>
               </span>
                @endif
            </div>
        </div>
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
</div>
