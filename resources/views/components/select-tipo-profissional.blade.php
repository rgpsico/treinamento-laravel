<div class="form-group">
    <label for=""> Tipo Profissional:</label>
    <select class="form-select form-control" aria-label="Tipo de Profissional" name="especialidade">
        <option selected>Selecione um tipo de profissional</option>
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
        @endforeach
    </select>
</div>
