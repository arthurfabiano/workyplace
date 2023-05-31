<div class="form-group mb-3 {{ $errors->has('full_name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Nome Completo' }}<span class="text-danger">*</span></label>
    <input class="form-control mb-3" name="full_name" type="text" id="name" value="{{ isset($participant->full_name) ? $participant->full_name : ''}}" required>

    {!! $errors->first('full_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}<span class="text-danger">*</span></label>
    <input class="form-control mb-3" name="email" type="email" id="email" value="{{ isset($participant->email) ? $participant->email : ''}}" required>

    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}<span class="text-danger">*</span></label>
    <input class="form-control mb-3" name="phone" type="text" id="phone" value="{{ isset($participant->phone) ? $participant->phone : ''}}" required>

    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>

<hr>
<div class="form-group">
    <input name="event_id" type="hidden" value="{{ $participant->event_id }}" required>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Cadastrar' }}">
</div>
