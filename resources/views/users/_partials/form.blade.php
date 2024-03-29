<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name"name="name" placeholder="Digite seu nome">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
    </div>
    <div class="form-group">
        <label for="phone">Telefone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite seu telefone">
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <button type="reset" class="btn btn-secondary">Limpar</button>
</form>
