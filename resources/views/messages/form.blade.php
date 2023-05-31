<div class="form-group mb-3 {{ $errors->has('full_name') ? 'has-error' : ''}}">
    <label for="full_name" class="control-label">{{ 'Nome Completo' }}</label>
    <input class="form-control mb-3" name="full_name" type="text" id="full_name" value="{{ isset($message->full_name) ? $message->full_name : ''}}" required>

    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control mb-3" name="email" type="email" id="email" value="{{ isset($message->email) ? $message->email : ''}}" required>

    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('telefone') ? 'has-error' : ''}}">
    <label for="telefone" class="control-label">{{ 'Telefone' }}</label>
    <input class="form-control mb-3" name="telefone" type="text" id="telefone" value="{{ isset($message->telefone) ? $message->telefone : ''}}" required>

    {!! $errors->first('telefone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="control-label">{{ 'Mensagem' }}</label>
    <textarea rows="4" name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Digite a mensangem..." required>{{ old('message', @$message->message) }}</textarea>

    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>

<hr>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Cadastrar' }}">
</div>
