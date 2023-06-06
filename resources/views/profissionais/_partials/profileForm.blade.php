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


    <form action="{{route('profissional.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">


    <x-select :options="config('options.select_profissionais')" name="tipo" label="Tipo de Profisional" selected="Selecione" col='12' :data="$data ?? ''" />
        
       
    <x-select :options="config('options.simples')" name="status" value="id" label="Exibir na primeira Pagina" selected="Selecione" col='12' :data="$model ?? ''" />
       
  
    <div class="col-12">
        <div class="form-group">
            <label for="nome" class="form-label">Nome do Profissional</label>
            <input placeholder="Ex: Casa na Nova Brasilia" type="text" id="nome" name="nome" 
            class="form-control" value="{{ old('nome', $model->name ?? '') }}">
            @if ($errors->has('nome'))
                <div class="text-danger">{{ $errors->first('nome') }}</div>
            @endif
        </div>
    </div>

  
    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="telefone" class="form-label">Telefone parasss contato</label>
            <input placeholder="(21) 9999-9999" type="text" id="telefone" name="telefone"
                class="form-control" value="{{ old('telefone', $model->telefone ?? '') }}">
            @if ($errors->has('telefone'))
                <div class="text-danger">{{ $errors->first('telefone') }}</div>
            @endif
        </div>
    </div> 

    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input placeholder="profissional@12.com" type="text" id="email" name="email"
                class="form-control" value="{{ old('email',$model->email ?? '') }}">
            @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
    </div> 

    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="endereco" class="form-label">Endereço</label>
            <input placeholder="Rua saint Roman" type="text" id="endereco" name="endereco"
                class="form-control" value="{{ old('endereco',$model->profissional->endereco ?? '') }}">
            @if ($errors->has('endereco'))
                <div class="text-danger">{{ $errors->first('endereco') }}</div>
            @endif
        </div>
    </div> 

    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="instragan" class="form-label">Instagran</label>
            <input placeholder=" @intragran " type="text" id="instragan" name="instragan"
                class="form-control" value="{{ old('instragan', $model->profissional->instragan ?? '') }}">
            @if ($errors->has('instragan'))
                <div class="text-danger">{{ $errors->first('instragan') }}</div>
            @endif
        </div>
    </div> 

    <div class="col-12 mb-4">
        <div class="form-group">
            <label for="facebook" class="form-label">FaceBook</label>
            <input placeholder="Facebook" type="text" id="facebook" name="facebook"
                class="form-control" value="{{ old('facebook',$model->profissional->facebook ?? '') }}">
            @if ($errors->has('facebook'))
                <div class="text-danger">{{ $errors->first('facebook') }}</div>
            @endif
        </div>
    </div> 
    
    <div class="col-12">
        <div class="form-group">
            <label for="description" class="form-label">Descrição do seu serviço:</label>
            <textarea id="description" cols="30" rows="5" name="sobre" class="form-control" 
            placeholder="Ex: Profissional da area de tecnologia">{{ old('sobre', $model->profissional->sobre ?? '') }}</textarea>
            @if ($errors->has('sobre'))
                <div class="text-danger">{{ $errors->first('sobre') }}</div>
            @endif
        </div>
    </div>
    


    <div class="row">
        <div class="form-group col-6">
            <label class="label"> Foto Principal</label>
            <br>
            <input type="file" name="fotos_principais[]" multiple id="fotos_principais" class="forn-control" maxlength="5">
            @if ($errors->has('foto'))
                <div class="text-danger">{{ $errors->first('foto') }}</div>
            @endif
        </div>
    </div>
        <div class="gallery">
            @if(isset($model->fotosPrincipais))
                @foreach ($model->fotosPrincipais as $gallery)
                <div class="card profissionais-{{$gallery->id}}">
                    <div class="card-body">
                        <img class="gallery-image" src="{{ asset('imagens/profissionais/' . $gallery->image) }}" alt="{{ $model->name }}"
                         width="200px" height="200px" style="width:200px; height:200px;">
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

    <div class="row">
        <div class="form-group col-6">
            <label class="label">Foto do Portifólio (4) Fotos</label>
            <br>
            <input type="file" name="fotos_slider[]" multiple id="fotos_slider" class="forn-control" maxlength="5">
            @if ($errors->has('foto'))
                <div class="text-danger">{{ $errors->first('foto') }}</div>
            @endif
        </div>
        <div class="col-12">           
            <div class="gallery">
                @if(isset($model->sliderImages))
                    @foreach ($model->sliderImages as $gallery)
                    <div class="card profissionais-{{$gallery->id}}">
                        <div class="card-body">
                            <img class="gallery-image" src="{{ asset('imagens/profissionais/' . $gallery->image) }}" alt="{{ $model->name }}"
                             width="200px" height="200px" style="width:200px; height:200px;">
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

    
    <div class="card-footer">
        <button type="submit" class="btn btn-primary"> 
            {{isset($model) && $model == true ? 'Editar Perfil' : 'Cadastrar Perfil'}}
        </button>
    </div>
    </form>

    

</div>
</div>
</div>




<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<script>
      CKEDITOR.replace('description', {
    toolbar: [
        { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
        { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'editing', items: [ 'Scayt' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
        { name: 'tools', items: [ 'Maximize' ] },
        { name: 'document', items: [ 'Source' ] },
     
        '/',
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
        { name: 'styles', items: [ 'Styles', 'Format' ] },
        { name: 'about', items: [ 'About' ] }
    ]
});

   $(document).ready(function() {
    $(document).on('click', '.excluir_imagem', function(e) {
        e.preventDefault();

        let id = $(this).data('id');
        let token = $('meta[name="csrf-token"]').attr('content'); // obter o valor do token CSRF

        
        if (confirm('Tem certeza que deseja excluir essa imagem?')) { // pergunta de confirmação
            $.ajax({
                url: "/api/profissionalImage/"+id+'/delete',
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token // adicionar o cabeçalho CSRF com o valor do token
                },
                success: function(response) {
                    alert(response.message )
                    if(response.message == "Imagem excluída com sucesso.")
                    {
                       
                    }
                    $('.profissionais-'+id).hide('slow')
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});

</script>
