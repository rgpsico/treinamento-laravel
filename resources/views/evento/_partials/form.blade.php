<div class="container mt-5">
    <form action="{{ isset($evento) ? route('evento.update', $evento->id) : route('evento.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if(isset($evento))
            @method('PUT')
        @endif

        <!-- Título -->
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título do Evento" value="{{ isset($evento) ? $evento->titulo : old('titulo') }}">
            @error('titulo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Descrição -->
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3" placeholder="Descrição do Evento">{{ isset($evento) ? $evento->descricao : old('descricao') }}</textarea>
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Data do Evento -->
        <div class="form-group">
            <label for="data_evento">Data do Evento:</label>
            <input type="date" id="data_evento" name="data_evento" class="form-control" value="{{ isset($evento) ? date('Y-m-d', strtotime($evento->data_evento)) : old('data_evento') }}">
            @error('data_evento')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Local -->
        <div class="form-group">
            <label for="local">Local:</label>
            <select id="local" name="local" class="form-control">
                <option value="local1" {{ (isset($evento) && $evento->local == 'local1') || old('local') == 'local1' ? 'selected' : '' }}>Local 1</option>
                <option value="local2" {{ (isset($evento) && $evento->local == 'local2') || old('local') == 'local2' ? 'selected' : '' }}>Local 2</option>
            </select>
            @error('local')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Capacidade -->
        <div class="form-group">
            <label for="capacidade">Capacidade:</label>
            <input type="number" id="capacidade" name="capacidade" class="form-control" placeholder="Capacidade de Pessoas" value="{{ isset($evento) ? $evento->capacidade : old('capacidade') }}">
            @error('capacidade')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status (Apenas adicionado como um exemplo extra) -->
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control">
                <option value="1" {{ (isset($evento) && $evento->status == 1) || old('status') == '1' ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ (isset($evento) && $evento->status == 0) || old('status') == '0' ? 'selected' : '' }}>Inativo</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Imagem (Apenas adicionado como um exemplo extra) -->
        <div class="form-group">
            <label for="imagem">Imagem do Evento:</label>
            <input type="file" id="imagem" name="imagem" class="form-control">
            @error('imagem')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($evento) ? 'Atualizar' : 'Cadastrar' }} Evento</button>
    </form>
</div>
