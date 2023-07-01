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

body {
  font-family: Arial, sans-serif;
}

.form-control {
  border-radius: 0;
  border: 1px solid #ccc;
}

.label {
  font-weight: bold;
  color: #444;
}

.btn-primary {
  background-color: #007bff;
  border: none;
  color: white;
  padding: 12px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
}

.btn-primary:hover {
  background-color: #0069d9;
}

.text-danger {
  color: #dc3545;
}

.gallery {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.card {
  margin-bottom: 20px;
}

.card img {
  width: 100%;
  height: auto;
}


</style>
<div class="card-body">


    <input type="hidden" name="user_id" value="{{ Auth::id() }}">





    <x-select :options="config('options.imovel_tipos')" name="type" label="Tipo de imovel" selected="Selecione" col='12' :data="$data ?? ''" />
        
       
    <x-select :options="config('options.imovel_status')" name="status" value="id" label="Status do imovel" selected="Selecione" col='12' :data="$data ?? ''" />
         
    


    @if(Auth::user()->is_admin || Auth::user()->email == config('super.email'))
        <div class="col-12">
            <div class="form-group">
                <label for="">Status Admin</label>
                <select name="status_admin" id="status_admin" class="form-control">
                    @if (isset($data->status_admin) && !is_null($data->status_admin) || Auth::user()->email == config('super.email'))
                        <option value="0" {{ isset($data->status_admin) && $data->status_admin  == 0 ? 'selected' : '' }} class="form-control">Livre
                        </option>
                        <option value="1" {{ isset($data->status_admin) && $data->status_admin == 1 ? 'selected' : '' }} class="form-control">Alugado
                        </option>
                    @else
                        <option value="0" selected class="form-control">Bloqueado </option>
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
            class="form-control" value="{{ old('title', $data->title ?? '') }}">
            @if ($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>
    </div>


    <x-select :options="config('options.select_comunidade')"  label="Comunidade" wiremodel="place" selected="Selecione" col='12'  />



    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="address" class="form-label">Lugar da Comunidade:</label>
            <input placeholder="Ex: Rampinha, Pistão, Terreirão" type="text" id="address" name="address"
                class="form-control" value="{{ old('address',$data->address ?? '') }}">
            @if ($errors->has('address'))
                <div class="text-danger">{{ $errors->first('address') }}</div>
            @endif
        </div>
    </div>


    <div class="col-12 mb-0">
        <div class="row">
            <div class="form-group col-12 col-md-2">
                <label for="deposito" class="label">Tem Deposito:</label>
                <input  type="checkbox" id="deposito" name="deposito" {{old('deposito') == 'on' ? 'checked' : ''}}   {{ isset($data->deposito) &&  $data->deposito || old('deposito')  == 1 ? 'checked' : ''  }}>
                @if ($errors->has('deposito'))
                    <div class="text-danger">{{ $errors->first('deposito') }}</div>
                @endif
            </div>
    
            <div class="form-group col-12 col-md-2">
                <label for="venda" class="label">Estou Vendendo:</label>
                <input  type="checkbox" id="venda" name="venda" {{old('venda') == 'on' ? 'checked' : ''}}  {{ isset($data->venda) &&  $data->venda  == 1 ? 'checked' : ''  }}>
                @if ($errors->has('venda'))
                    <div class="text-danger">{{ $errors->first('venda') }}</div>
                @endif
            </div>
        </div>
    </div>
    


    

    
    <div class="col-12">
        <div class="form-group">
            <label for="description" class="form-label">Descrição:</label>
            <textarea id="description" cols="30" rows="5" name="description" class="form-control" placeholder="Ex: Quarto com cozinha banheiro.">{{ old('description', $data->description ?? '') }}</textarea>
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>
    </div>
    

    <div class="col-12">
        <div class="form-group">
            <label for="price" class="form-label">Preço:</label>
            <input type="number" id="price" name="price" step="0.01" min="0" max="10000"
                class="form-control" value="{{ $data->price ?? '' }}" placeholder="R$ 200,00">
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
    <button type="submit" class="btn btn-primary"> {{isset($data) && $data == true ? 'Editar Imóvel' : 'Cadastrar Imóvel'}}</button>
</div>
</form>

<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<script>
      CKEDITOR.replace( 'description' );
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
