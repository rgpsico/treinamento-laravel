
<x-layout title="Detalhes">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/bootstrap-icons.min.css" integrity="sha512-8Uw8Px+7IjPzB6qg9qJvQlMQR+nSxgJjpQnACCVWPIgFd4C4/yIW4z1Uv0F9Y9XJLb6Uy5x5E5f5E+F5Om0pg5w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  .entregador-card {
    border-radius: 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .entregador-avatar {
    height: 200px;
    object-fit: cover;
  }

  .entregador-card .card-body {
    position: relative;
  }

  .star-rating {
    font-size: 1.25em;
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: left;
    margin-bottom: 0.5rem;
  }
  /* ... demais estilos de .star-rating ... */
</style>



    <div class="container mt-5 mb-4" style="min-height:500px;">
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('/uploads/' . $model->avatar) }}" alt="Foto do Entregador" class="img-thumbnail">
            </div>
        
        <div class="col-8">
            <!-- Informações do entregador -->
            <h2 class="mb-2" style="text-transform:capitalize;">{{$model->name}}</h2>
            <p>{{$model->description}}</p>
            
            <a href="https://api.whatsapp.com/send?phone={{$model->phone}}" target="_blank" class="btn btn-success">
                <i class="bi bi-whatsapp"></i> Entrar em contato
            </a>
            
            <h3 class="my-4">Serviços</h3>
                <ul class="list-group">
                    <li class="list-group-item">Entregador de material</li>
                    <li class="list-group-item">Compro pão</li>
                    <li class="list-group-item">Entulhos em geral</li>
                    <li class="list-group-item">Furo buraco</li>
                </ul>
        </div>
    


</div>
</div>
      
</x-layout>

<script>
    $(document).ready(function() {
        $('.thumb-gallery').click(function() {
            $('.principal').attr('src', $(this).attr('src')).fadeOut();
            var img = new Image();
            img.src = $('.principal').attr('src');
            img.onload = function() {
                $('.principal').fadeIn();
            };
        })


    })
</script>
