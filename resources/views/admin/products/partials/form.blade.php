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
