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


<div class="col-6 mb-2 d-flex justify-content-start align-items-start">
    <h1 class="text-dark font-weight-bold">Editar Perfil  </h1>
</div>

<div class="card-body">


    <input type="hidden" name="user_id" value="{{ Auth::id() }}">


    <x-select :options="config('options.imovel_tipos')" name="type" label="Tipo de Profisional" selected="Selecione" col='12' :data="$data ?? ''" />
        
       
    <x-select :options="config('options.simples')" name="status" value="id" label="Exibir na primeira Pagina" selected="Selecione" col='12' :data="$data ?? ''" />
       
  
    <div class="col-12">
        <div class="form-group">
            <label for="nome" class="form-label">Nome do Profissional</label>
            <input placeholder="Ex: Casa na Nova Brasilia" type="text" id="nome" name="nome" 
            class="form-control" value="{{ old('nome', $data->nome ?? '') }}">
            @if ($errors->has('nome'))
                <div class="text-danger">{{ $errors->first('nome') }}</div>
            @endif
        </div>
    </div>

  
    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="telefone" class="form-label">Telefone para contato</label>
            <input placeholder="(21) 9999-9999" type="text" id="telefone" name="telefone"
                class="form-control" value="{{ old('telefone',$data->telefone ?? '') }}">
            @if ($errors->has('telefone'))
                <div class="text-danger">{{ $errors->first('telefone') }}</div>
            @endif
        </div>
    </div> 

    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input placeholder="profissional@12.com" type="text" id="email" name="email"
                class="form-control" value="{{ old('email',$data->email ?? '') }}">
            @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
    </div> 

    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="endereco" class="form-label">Endereço</label>
            <input placeholder="Rua saint Roman" type="text" id="endereco" name="endereco"
                class="form-control" value="{{ old('endereco',$data->endereco ?? '') }}">
            @if ($errors->has('endereco'))
                <div class="text-danger">{{ $errors->first('endereco') }}</div>
            @endif
        </div>
    </div> 

    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="instragan" class="form-label">Instagran</label>
            <input placeholder=" @intragran " type="text" id="instragan" name="instragan"
                class="form-control" value="{{ old('instragan',$data->instragan ?? '') }}">
            @if ($errors->has('instragan'))
                <div class="text-danger">{{ $errors->first('instragan') }}</div>
            @endif
        </div>
    </div> 

    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="facebook" class="form-label">FaceBook</label>
            <input placeholder="Facebook" type="text" id="facebook" name="facebook"
                class="form-control" value="{{ old('facebook',$data->facebook ?? '') }}">
            @if ($errors->has('facebook'))
                <div class="text-danger">{{ $errors->first('facebook') }}</div>
            @endif
        </div>
    </div> 
    
    <div class="col-12">
        <div class="form-group">
            <label for="description" class="form-label">Descrição do seu serviço:</label>
            <textarea id="description" cols="30" rows="5" name="description" class="form-control" 
            placeholder="Ex: Profissional da area de tecnologia">{{ old('description', $data->description ?? '') }}</textarea>
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>
    </div>
    


    <div class="row">
        <div class="form-group col-6">
            <label class="label"> Fotos Principal</label>
            <br>
            <input type="file" name="foto[]" multiple id="foto" class="forn-control" maxlength="5">
            @if ($errors->has('foto'))
                <div class="text-danger">{{ $errors->first('foto') }}</div>
            @endif
        </div>
        <div class="col-12">           
            <div class="gallery">                  
            </div>          
        </div>
    </div>

    <div class="row">
        <div class="form-group col-6">
            <label class="label">Foto do Slider (4) Fotos</label>
            <br>
            <input type="file" name="foto[]" multiple id="foto" class="forn-control" maxlength="5">
            @if ($errors->has('foto'))
                <div class="text-danger">{{ $errors->first('foto') }}</div>
            @endif
        </div>
        <div class="col-12">           
            <div class="gallery">                  
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
