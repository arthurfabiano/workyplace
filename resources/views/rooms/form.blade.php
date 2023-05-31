<div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Nome' }}<span class="text-danger">*</span></label>
    <input class="form-control mb-3" name="name" type="text" id="name" value="{{ isset($room->name) ? $room->name : ''}}" required>

    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('number_of_participants') ? 'has-error' : ''}}">
    <label for="number_of_participants" class="control-label">{{ 'Número de Participantes' }}<span class="text-danger">*</span></label>
    <input class="form-control mb-3" name="number_of_participants" type="text" id="number_of_participants" value="{{ isset($room->number_of_participants) ? $room->number_of_participants : ''}}" required>

    {!! $errors->first('number_of_participants', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Descrição' }}<span class="text-danger">*</span></label>
    <textarea rows="4" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Digite aqui seu texto..." required>{{ old('description', @$room->description) }}</textarea>

    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<hr>
<div class="form-group">
    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}" required>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Cadastrar' }}">
</div>
