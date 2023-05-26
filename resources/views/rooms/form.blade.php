<div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Nome' }}</label>
    <input class="form-control mb-3" name="name" type="text" id="name" value="{{ isset($room->name) ? $room->name : ''}}" required>

    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('number_of_participants') ? 'has-error' : ''}}">
    <label for="number_of_participants" class="control-label">{{ 'Número de Participantes' }}</label>
    <input class="form-control mb-3" name="number_of_participants" type="text" id="number_of_participants" value="{{ isset($room->number_of_participants) ? $room->number_of_participants : ''}}" required>

    {!! $errors->first('number_of_participants', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Descrição' }}</label>
    <input class="form-control mb-3" name="description" type="text" id="description" value="{{ isset($room->description) ? $room->description : ''}}" required>

    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<hr>
<div class="form-group">
    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}" required>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Cadastrar' }}">
</div>
