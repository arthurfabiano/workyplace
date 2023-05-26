<div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Nome do Palestrante' }}</label>
    <input class="form-control mb-3" name="name" type="text" id="name" value="{{ isset($speaker->name) ? $speaker->name : ''}}" required>

    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('telefone') ? 'has-error' : ''}}">
    <label for="telefone" class="control-label">{{ 'Telefone' }}</label>
    <input class="form-control mb-3" name="telefone" type="text" id="telefone" value="{{ isset($speaker->telefone) ? $speaker->telefone : ''}}" required>

    {!! $errors->first('telefone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control mb-3" name="email" type="email" id="email" value="{{ isset($speaker->email) ? $speaker->email : ''}}" required>

    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Descrição' }}</label>
    <textarea rows="4" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Digite aqui seu texto..." required>{{ old('description', @$speaker->description) }}</textarea>

    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('skills') ? 'has-error' : ''}}">
    <label for="skills" class="control-label">{{ 'Skills' }}</label>
    <br/>
    <select class="form-select" name="skills[]" size="3" multiple aria-label="size 3 select example">
        <option value="HTML" {{ isset($skills) ? in_array('HTML', $skills) ? 'selected' : '' : ''}}>HTML</option>
        <option value="CSS" {{ isset($skills) ? in_array('CSS', $skills) ? 'selected' : '' : ''}}>CSS</option>
        <option value="JavaScript" {{ isset($skills) ? in_array('JavaScript', $skills) ? 'selected' : '' : ''}}>JavaScript</option>
        <option value="Python" {{ isset($skills) ? in_array('Python', $skills) ? 'selected' : '' : ''}}>Python</option>
        <option value="NodeJs" {{ isset($skills) ? in_array('NodeJs', $skills) ? 'selected' : '' : ''}}>NodeJs</option>
        <option value="VueJs" {{ isset($skills) ? in_array('VueJs', $skills) ? 'selected' : '' : ''}}>VueJs</option>
        <option value="PHP" {{ isset($skills) ? in_array('PHP', $skills) ? 'selected' : '' : ''}}>PHP</option>
    </select>
    {!! $errors->first('skills', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Imagem' }}</label>
    <input class="form-control mb-3" name="image" type="file" id="image" value="{{ isset($speaker->image) ? $speaker->image : ''}}">

    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<hr>
<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Cadastrar' }}">
</div>
