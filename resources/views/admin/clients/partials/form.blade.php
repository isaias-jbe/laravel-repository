<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 01/05/19
 * Time: 12:26
 */
?>
@csrf
<div class="box-body">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">Nome:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $client->name ?? old('name') }}">
                </div>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-mail:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $client->email ?? old('email') }}">
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="form-group has-feedback {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">Telefone:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-mobile"></i>
                    </div>
                    <input type="phone" class="form-control" id="phone" name="phone" value="{{ $client->phone ?? old('phone') }}"
                           data-inputmask="'mask': ['(99) 9 9999-9999']" data-mask>
                </div>
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
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
