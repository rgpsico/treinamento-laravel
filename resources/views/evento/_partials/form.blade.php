<div class="container mt-5">
    <form action="{{ route('evento.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Título -->
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título do Evento" value="{{ old('titulo') }}">
            @error('titulo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Descrição -->
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3" placeholder="Descrição do Evento">{{ old('descricao') }}</textarea>
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Data do Evento -->
        <div class="form-group">
            <label for="data_evento">Data do Evento:</label>
            <input type="date" id="data_evento" name="data_evento" class="form-control" value="{{ old('data_evento') }}">
            @error('data_evento')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Local -->
        <div class="form-group">
            <label for="local">Local:</label>
            <select id="local" name="local" class="form-control">
                <!-- Opções de Locais -->
                <option value="local1">Local 1</option>
                <option value="local2">Local 2</option>
                <!-- Adicione quantas opções precisar -->
            </select>
            @error('local')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Capacidade -->
        <div class="form-group">
            <label for="capacidade">Capacidade:</label>
            <input type="number" id="capacidade" name="capacidade" class="form-control" placeholder="Capacidade de Pessoas" value="{{ old('capacidade') }}">
            @error('capacidade')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Evento</button>
    </form>
</div>
