<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 01/05/19
 * Time: 12:43
 */
?>
@csrf
<div class="box-body">

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nome do Produto:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-diamond"></i>
                    </div>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?? old('name') }}">
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
        <div class="col-xs-6">
            <div class="form-group has-feedback {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="url">Categoria:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-gear"></i>
                    </div>
                    <select name="category_id" class="form-control">
                        <option value="">Selecione...</option>
                        @foreach($categories as $id => $category)
                            <option value="{{ $id }}"
                                    @if(isset($product->category_id) && $id == $product->category_id) selected @endif
                            >{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-xs-3">
            <div class="form-group has-feedback {{ $errors->has('cost_price') ? 'has-error' : '' }}">
                <label for="cost_price">Preço de custo:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-money"></i>
                    </div>
                    <input type="text" class="form-control" id="cost_price" name="cost_price" value="{{ $product->cost_price ?? old('cost_price') }}">
                </div>
                @if($errors->has('cost_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cost_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group has-feedback {{ $errors->has('sale_price') ? 'has-error' : '' }}">
                <label for="sale_price">Preço de venda:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-money"></i>
                    </div>
                    <input type="text" class="form-control" id="sale_price" name="sale_price" value="{{ $product->sale_price ?? old('sale_price') }}">
                </div>
                @if($errors->has('sale_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sale_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Descrição do Produto:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-sort-alpha-asc"></i>
                    </div>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $product->description ?? old('description') }}</textarea>
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
