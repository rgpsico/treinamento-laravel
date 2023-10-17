
<div class="form-group">
    <label for="">Especialidade:</label>
    <select class="form-select form-control" aria-label="Tipo de Profissional" name="tipo_id">
        <option value="">Selecione um tipo de profissional</option>
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{ $tipo->id == $selected ? 'selected' : '' }}>{{ $tipo->nome }}</option>
        @endforeach
    </select>
</div>
