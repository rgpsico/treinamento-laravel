<div class="modal fade" id="addProfissaoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Profissão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nomeProfissao">Nome da Profissão:</label>
                    <input type="text" class="form-control" id="nomeProfissao" required>
                </div>
                {{-- <div class="form-group">
                    <label for="descricaoProfissao">Descrição da Profissão:</label>
                    <textarea class="form-control" id="descricaoProfissao" required></textarea>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="saveProfissao">Salvar</button>
            </div>
        </div>
    </div>
</div>
