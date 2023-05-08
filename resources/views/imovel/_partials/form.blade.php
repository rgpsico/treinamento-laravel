<style>
    .form-label {
        display: inline-block;
        margin-bottom: 0.1rem;
        font-weight: 600;
    }

    .gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

.gallery-image {
    width: 200px;
    height: 200px;
    object-fit: cover;
}

</style>
<div class="card-body">


    <input type="hidden" name="user_id" value="{{ Auth::id() }}">





    <div class="col-12">
        <div class="form-group">
            <label for="type" class="form-label">Tipo de imovel</label>
            @if (isset($data->type) && !is_null($data->type))
                <select name="type" id="type" name="type" class="form-control">
                    <option value="1" {{ $data->type == 0 ? 'selected' : '' }} class="form-control">Casa</option>
                    <option value="2" {{ $data->type == 1 ? 'selected' : '' }} class="form-control">Kitnet</option>
                    <option value="3" {{ $data->type == 2 ? 'selected' : '' }} class="form-control">Loja</option>
                </select>
            @else
                <select name="type" id="type" name="type" class="form-control">
                    <option value="" selected>Selecione</option>
                    <option value="1" class="form-control">Casa</option>
                    <option value="2" class="form-control">Kitnet</option>
                    <option value="3" class="form-control">Loja</option>
                </select>
            @endif

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Status do imovél</label>
            <select name="status" id="status" class="form-control">
                <option value="" selected>Selecione</option>
                @if (isset($data->status) && !is_null($data->status))
                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }} class="form-control">Livre
                    </option>
                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }} class="form-control">Alugado
                    </option>
                @else
                    <option value="0" class="form-control">Livre</option>
                    <option value="1" class="form-control">Oculpado</option>
                @endif


            </select>
        </div>
    </div>

    @if(Auth::user()->is_admin)
    <div class="col-12">
        <div class="form-group">
            <label for="">Status Admin</label>
            <select name="status_admin" id="status_admin" class="form-control">
                <option value="" selected>Selecione</option>
                @if (isset($data->status_admin) && !is_null($data->status_admin))
                    <option value="0" {{ $data->status_admin == 0 ? 'selected' : '' }} class="form-control">Livre
                    </option>
                    <option value="1" {{ $data->status_admin == 1 ? 'selected' : '' }} class="form-control">Alugado
                    </option>
                @else
                    <option value="0" class="form-control">Bloqueado </option>
                    <option value="1" class="form-control">Liberado</option>
                @endif


            </select>
        </div>
    </div>
    @endif

    <div class="col-12">
        <div class="form-group">
            <label for="title" class="form-label">Titulo do imovél:</label>
            <input placeholder="Ex: Casa na Nova Brasilia" type="text" id="title" name="title"
                class="form-control" value="{{ $data->title ?? '' }}">
            @if ($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>
    </div>


    <div class="col-12">
        <div class="form-group">
            <label for="description" class="form-label">Descrição:</label>
            <input placeholder="Ex: Casa Com cozinha pequena e um Quarto " type="text" id="description"
                name="description" class="form-control" value="{{ $data->description ?? '' }}">
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('email_desc') }}</div>
            @endif
        </div>
    </div>



    <div class="col-12">
        <div class="form-group">
            <label for="address" class="form-label">Lugar da Comunidade:</label>
            <input placeholder="Ex: Rampinha, Pistão, Terreirão" type="text" id="address" name="address"
                class="form-control" value="{{ $data->address ?? '' }}">
            @if ($errors->has('address'))
                <div class="text-danger">{{ $errors->first('address') }}</div>
            @endif
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="price" class="form-label">Preço:</label>
            <input type="number" id="price" name="price" step="0.01" min="0" max="10000"
                class="form-control" value="{{ $data->price ?? '' }}">
            @if ($errors->has('price'))
                <div class="text-danger">{{ $errors->first('price') }}</div>
            @endif
        </div>
    </div>





    @if (count($itens) > 0)
        <div class="col-12">
            <div class="form-group">
                <label for="item" class="form-label">Itens:</label>
                <br>
                <div class="row">
                    @foreach ($itens as $item)
                    <label for="item" class="ml-4 m-2" name="item">{{ $item->name }}</label>
                    @if(isset($data) && is_object($data) && isset($data->itens) && $data->itens->contains('item_id', $item->id))
                        <input type="checkbox" class="" name="itens[]" value="{{ $item->id }}" checked>
                    @else
                        <input type="checkbox" class="" name="itens[]" value="{{ $item->id }}">
                    @endif
                @endforeach               
            </div>
        </div>
     </div>
    @endif



    <div class="row">
        <div class="form-group col-6">
            <label class="label"> Fotos do imovel (Max) 5 Fotos</label>
            <br>
            <input type="file" name="avatar[]" multiple id="avatar" class="forn-control" maxlength="5">
            @if ($errors->has('avatar'))
                <div class="text-danger">{{ $errors->first('avatar') }}</div>
            @endif
        </div>
        <div class="col-12">           
            <div class="gallery">
                @if(isset($data->gallery))
                    @foreach ($data->gallery as $gallery)
                    <div class="card img_imovel-{{$gallery->id}}">
                        <div class="card-body">
                            <img class="gallery-image" src="{{ asset('imagens/imoveis/' . $gallery->image) }}" alt="{{ $data->title }}">
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger excluir_imagem" data-id={{$gallery->id}}>
                                <i class="fas fa-trash-alt "></i> Excluir
                            </button>
                            
                        </div>
                    </div>
                    @endforeach
                @endif    
            </div>
            
           
        </div>
    </div>

</div>
</div>
</div>


<div class="card-footer">
    <button type="submit" class="btn btn-primary"> {{!isset($data) == true ? 'Editar Imóvel' : 'Cadastrar Imóvel'}}</button>
</div>
</form>

<script>
   $(document).ready(function() {
    $(document).on('click', '.excluir_imagem', function(e) {
        e.preventDefault();

        let id = $(this).data('id');
        let token = $('meta[name="csrf-token"]').attr('content'); // obter o valor do token CSRF

        
        if (confirm('Tem certeza que deseja excluir essa imagem?')) { // pergunta de confirmação
            $.ajax({
                url: "/api/galeria/"+id+'/delete',
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token // adicionar o cabeçalho CSRF com o valor do token
                },
                success: function(response) {
                    alert(response.message )
                    if(response.message == "Imagem excluída com sucesso.")
                    {
                        $('.img_imovel-'+id).hide('slow')
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});

</script>
