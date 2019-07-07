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
                <label for="name">Nome do Usuário:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? old('name') }}">
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
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? old('email') }}">
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
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Senha:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </div>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="password2">Confirmar senha:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </div>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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
