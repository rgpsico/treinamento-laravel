<form method="POST" action="{{ route('depoimento.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Author</label>
        <input type="text" class="form-control" id="autor"name="autor" placeholder="O nome do author">
    </div>
    <div class="form-group">
        <label for="email">Depoimento</label>
        <textarea name="depoimento" id="depoimento" cols="30" rows="10" class="form-control" placeholder="Depoimento">

        </textarea>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <button type="reset" class="btn btn-secondary">Limpar</button>
</form>
