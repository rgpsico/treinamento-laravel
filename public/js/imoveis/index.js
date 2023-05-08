
function typeCasa(tipo)
{
    switch (tipo) {
        case 0:
            return 'Casa'
        case 1:
            return 'KitNet'    
        break;
    
        default:
            return 'Loja'
            break;
    }
}

function statusImovel(tipo)
{
    switch (tipo) {
        case 0:
            return 'Livre'
        case 1:
            return 'Alugado'    
        break;
    
    }
}

function statusAdmin(tipo)
{
    switch (tipo) {
        case 0:
            return 'Em Revisão'
        case 1:
            return 'Liberado'    
        break;
    
    }
}
function row(data) {
    var created_at = moment(data.created_at).format('DD/MM/YYYY');

    return `
        <tr>
            <td><input type="checkbox" name="ids[]" value="${data.id}" class="checkbox-item"></td>
            <td><img src="/imagens/imoveis/${data.gallery[0].image}" width="50"></td>
            <td>${data.title}</td>
            <td>${data.price}</td>
            <td>${typeCasa(data.type)}</td>
            <td>${statusImovel(data.status)}</td>
            <td>${statusAdmin(data.status_admin)}</td>
            <td>${data.user_name}</td>
            <td>${created_at}</td>
            <td>
                <a href="/admin/imovel/${data.id}/edit" class="btn btn-primary btn-sm">Editar</a>
                <a href="/admin/imovel/${data.id}/show" class="btn btn-info btn-sm">Ver</a>
                <a href="/admin/imovel/${data.id}/destroy" class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>
    `;
}


   

 
    $('.filtros').change(function() {

    var tipo = $(this).val();
   
   
    $.ajax({
        url: '/api/imovel/search',
        type: 'GET',
        data: {
            tipo: tipo,
            status:$('#status').val(),
            proprietario:$('#proprietario').val()
        
        },
        success: function(response) {
            var imoveisBody = $('#imoveis_body');
            imoveisBody.empty();
            $.each(response.imoveis, function(index, imovel) {
                var rowHtml = row(imovel);
                imoveisBody.append(rowHtml);
            });
        },
        error: function(response) {
           
        }
    });
});

      
        $('#acao_imoveis').click(function(e) {
            e.preventDefault()
            var ids = [];
            $('input[name="checkboxImovel"]:checked').each(function() {
                ids.push($(this).data('id'));
            });
            if (ids.length === 0) {
                alert('Nenhum item selecionado');
                return;
            }
            if (confirm('Tem certeza que deseja excluir os itens selecionados?')) {
                $.ajax({
                    url: deleteSelectedUrl,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: ids
                    },
                    success: function(response) {
                        alert('Itens excluídos com sucesso');
                        location.reload();
                    },
                    error: function() {
                        alert('Ocorreu um erro ao excluir os itens');
                    }
                });
            }
        });


        $(document).on('change', '#status_admin', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var url = '/api/imovel/' + id + '/update';

            $.ajax({
                type: 'PUT',
                url: url,
                data: {
                    status_admin: $(this).val()
                },
                success: function(data) {
                    alert('Atualizado com sucesso')
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
        // Selecione o checkbox com o id "marcarTodos"
        const marcarTodos = document.querySelector('#marcarTodos');

        // Selecione todos os checkboxes dentro da tabela com o id "tableLisst"
        const checkboxes = document.querySelectorAll('#imovelLista input[type="checkbox"]');

        // Adicione um listener de evento no checkbox "marcarTodos"
        marcarTodos.addEventListener('click', function() {
            // Verifique se o checkbox "marcarTodos" está marcado ou não
            const isChecked = marcarTodos.checked;

            // Percorra todos os checkboxes dentro da tabela "tableLisst" e marque/desmarque cada um deles
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = isChecked;
            });
        });