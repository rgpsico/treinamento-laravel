<div>
    @include('novo._partials.banner')
    <!-- Categories -->
    <section class="top_listings">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Profissionais</h2>
                </div>
            </div>
            <!-- Row  -->
            <div class="row">
                <form class="top_listings_search">

                    <div class="form-group">
                        <input wire:model="search" type="search" class="form-control p-form"
                            placeholder="Nome do Entregador">
                    </div>


                  
                    <div class="form-group selectdiv">
                        <x-select :options="$tipos"   wiremodel="tipo" selected="Selecione" col='12'  />
                    </div>
                   
                    <div class="form-group selectdiv">
                  
                    <x-select :options="config('options.select_comunidade')"   wiremodel="place" selected="Selecione" col='12'  />
                </div>
                </form>
            </div>
       
        @php 
            $routeUrl="show.profissionais"; 
            $pasta="imagens/entregadores/"; 
        @endphp
            <div class="row">

                @foreach ($model as $data)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6" onclick="teste()">
                        <div class="featured-parts rounded m-t-30">
                            <a href="{{ route($routeUrl.'.public', ['id' => $data->id]) }}">
                            
                                <div class="featured-img">
                                    <img style="max-width:100%; height:200px;" class="img-fluid rounded-top"
                                        src="{{ asset($pasta.$data->avatar ) }}" alt="{{ $data->nome }}" />
            
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
       </div>
</div>
</section>
</div>
