<div class="form-group mb-3 {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label for="last_name" class="control-label">{{ 'Nome' }}</label>
    <input class="form-control mb-3" name="last_name" type="text" id="last_name" value="{{ isset($user->last_name) ? $user->last_name : ''}}" required>

    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('Sobrenome') ? 'has-error' : ''}}">
    <label for="first_name" class="control-label">{{ 'First Name' }}</label>
    <input class="form-control mb-3" name="first_name" type="text" id="first_name" value="{{ isset($user->first_name) ? $user->first_name : ''}}" required>

    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control mb-3" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : ''}}" required>

    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Senha' }}</label>
    <input class="form-control mb-3" name="password" type="password" id="password" required>

    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<hr>
<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Cadastrar' }}">
</div>
