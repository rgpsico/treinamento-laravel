<style>
    .sponsored-img {
        position: absolute;
        top: 0;
        left: 0;
    }
    .fade-out {
    transition: opacity 0.3s ease;
}

.fade-in {
    transition: opacity 0.3s ease;
    display: none;  /* Inicialmente escondida */
}

[wire\:loading].fade-in,  /* Mostra enquanto carrega */
[wire\:loading.remove].fade-out {  /* Esconde enquanto carrega */
    opacity: 0;
}

[wire\:loading].fade-in {  
    display: block;  /* Mostra enquanto carrega */
}


</style>

<div class="row fade-out" >

    @foreach ($model as $data)
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6" wire:loading.remove>
            <div class="featured-parts rounded m-t-30">
                <a href="{{route('profissional.page', ['id' => $data->id])}}" target="_blank">
                
                  
                    <div class="featured-img">
                        @if (isset($data->fotosPrincipais[0])) 
                        <img style="max-width:100%; height:200px;" class="img-fluid rounded-top"
                            src="{{ asset('imagens/profissionais/'.$data->fotosPrincipais[0]->image) }}" alt="{{ $data->nome }}" />
                        @endif
                           
                        <img class="sponsored-img" src="{{ asset('images/ads/ads.png') }}" alt="Sponsored Image"
                            style="position:absolute; top:0; left:0;">
                    </div>
                </a>
                <div class="featured-text">
                    <div class="text-top d-flex justify-content-between">
                        <div class="heading">
                            <a href="{{ route($routeUrl.'.public', ['id' => $data->id]) }}">{{ $data->nome }}</a>
                        </div>
                        <div class="book-mark">
                            <a href="{{ route($routeUrl.'.public', ['id' => $data->id]) }}">
                                <i class="fa fa-bookmark"></i></a>
                        </div>
                    </div>
                    <div class="text-stars m-t-5">{{$data->name}}</div>
                    <div class="featured-bottum m-t-30">
                        <ul class="d-flex justify-content-between list-unstyled m-b-20">
                                <li><a href="#">
                                    <i class="fa fa-map-marker"></i> {{ $data->endereco }}</a>
                                </li>                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<button class="view-btn hvr-pulse-grow" wire:click="todos">Ver todos</button>
