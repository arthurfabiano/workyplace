<div class="form-group mb-3 {{ $errors->has('rooms') ? 'has-error' : ''}}">
    <div class="form-group mb-3 {{ $errors->has('rooms') ? 'has-error' : ''}}">
        <label for="rooms" class="control-label">{{ 'Salas' }}<span class="text-danger">*</span></label>
        <br/>
        <select class="form-select" name="room_id" aria-label="size 3 select example" required>
            <option value="">Selecione a Sala</option>
            @foreach( $rooms as $room )
                <option value="{{ $room->id }}" {{ $room->id == @$event->room_id ? 'selected' : '' }}>
                    {{ $room->name }} | Quantidade de Participantes: {{ $room->number_of_participants }}
                </option>
            @endforeach
        </select>
    </div>

    {!! $errors->first('topics', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('speakers') ? 'has-error' : ''}}">
    <div class="form-group mb-3 {{ $errors->has('speakers') ? 'has-error' : ''}}">
        <label for="speakers" class="control-label">{{ 'Palestrante' }}<span class="text-danger">*</span></label>
        <br/>
        <select class="form-select" name="speaker_id" aria-label="size 3 select example" required>
            <option value="">Selecione a Sala</option>
            @foreach( $speakers as $speaker )
                <option value="{{ $speaker->id }}" {{ $speaker->id == @$event->speaker_id ? 'selected' : '' }}>
                    {{ $speaker->name }}
                </option>
            @endforeach
        </select>
    </div>

    {!! $errors->first('topics', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Titulo' }}<span class="text-danger">*</span></label>
    <input class="form-control mb-3" name="title" type="text" id="title" value="{{ isset($event->title) ? $event->title : ''}}" required>

    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Descrição' }}<span class="text-danger">*</span></label>
    <textarea rows="4" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Digite aqui seu texto..." required>{{ old('description', @$event->description) }}</textarea>

    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('topics') ? 'has-error' : ''}}">
    <div class="form-group mb-3 {{ $errors->has('topics') ? 'has-error' : ''}}">
        <label for="topics" class="control-label">{{ 'Tópicos' }}<span class="text-danger">*</span></label>
        <br/>
        <select class="form-select" name="topics[]" size="3" multiple aria-label="size 3 select example">
            <option value="SEO/SEM Marketing" {{ isset($topics) ? in_array('SEO/SEM Marketing', $topics) ? 'selected' : '' : '' }}>SEO/SEM Marketing</option>
            <option value="Statistical Analysis" {{ isset($topics) ? in_array('Statistical Analysis', $topics) ? 'selected' : '' : '' }}>Statistical Analysis</option>
            <option value="Web Development" {{ isset($topics) ? in_array('Web Development', $topics) ? 'selected' : '' : ''}}>Web Development</option>
            <option value="Network Security" {{ isset($topics) ? in_array('Network Security', $topics) ? 'selected' : '' : ''}}>Network Security</option>
            <option value="Adobe Software Suite" {{ isset($topics) ? in_array('Adobe Software Suite', $topics) ? 'selected' : '' : ''}}>Adobe Software Suite</option>
            <option value="User Interface Design" {{ isset($topics) ? in_array('User Interface Design', $topics) ? 'selected' : '' : ''}}>User Interface Design</option>
        </select>
    </div>

    {!! $errors->first('topics', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('start_date') ? 'has-error' : ''}}">
    <label for="start_date" class="control-label">{{ 'Data e Hora de início' }}<span class="text-danger">*</span></label>
    <input class="form-control mb-3" name="start_date" type="datetime-local" id="start_date" value="{{ isset($event->start_date) ? $event->start_date : ''}}" required>

    {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('finish_date') ? 'has-error' : ''}}">
    <label for="finish_date" class="control-label">{{ 'Data de Hora de Término' }}<span class="text-danger">*</span></label>
    <input class="form-control mb-3" name="finish_date" type="datetime-local" id="finish_date" value="{{ isset($event->finish_date) ? $event->finish_date : ''}}" required>

    {!! $errors->first('finish_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Imagem' }}</label>
    <input class="form-control mb-3" name="image" type="file" id="image" value="{{ isset($event->image) ? $event->image : ''}}">

    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<hr>
<div class="form-group">
    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}" required>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Cadastrar' }}">
</div>
