<x-layout title="Detalhes">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .principal {
            width: 500;
            /* Altere para o tamanho desejado */
            height: 400px;
            /* Altere para o tamanho desejado */
            object-fit: cover;
        }

        .thumb-gallery {
            width: 100px;
            /* Altere para o tamanho desejado */
            height: 75px;
            /* Altere para o tamanho desejado */
            object-fit: cover;
        }
    </style>
    <!-- Detail_part -->
    <section class="detail_part m-t-50">
        <div class="container mb-5">
            <div class="row" style="padding:10px;">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                    <div class="detail_box">
                        @if (isset($data->gallery))
                            <img class="img-fluid principal"
                                width="550px"
                                height="400px"
                                src="{{ asset('imagens/imoveis/' . $data->gallery[0]->image) }}"
                                alt="{{ $data->title }}">
                        @endif
                        <div class="m-t-20">
                            <ul class="owl-carousel list-unstyled m-b-0" id="product_slider">
                                @if (isset($data->gallery))
                                    @foreach ($data->gallery as $key => $gallery)
                                        <li> <img class="img-fluid thumb-gallery"
                                                src="{{ asset('imagens/imoveis/' . $data->gallery[$key]->image) }}"
                                                alt="slide {{ $key }}">
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                    <div class="detail_box">
                        <div class="detail_head">
                            <h1> {{ $data->title }} <span style="font-size:29px; text-align: center; color:red; font-weight:bold; ">{{$data->venda == 1 ? '(Venda)' : '(Aluguel)'}}</span><br>
                            </h1>
                            <p style="text-transform: capitalize; margin-right:10px;">{{ $data->description }} </p>
                            <ul class="list-unstyled text-capitalize m-b-0 m-t-15">
                                <li class="d-inline-block p-r-20">
                                    <a href="#" style="font-size: 19px">
                                        <i class="fa fa-clock-o ml-2" >
                                        </i> Postado <span>{{ diasDesdePostagem($data->created_at) == '0' ? 'Hoje' : "a ".diasDesdePostagem($data->created_at). " dias." }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <ul class="list-unstyled d-inline-block float-left detail_left m-b-0 col-7">                                               
                            <li style="font-size:20px; margin-bottom:10px; margin-top:15px;">    
                            <i class="fas fa-money-bill"></i> {{ $data->deposito == 0 ? 'Não precisa de deposito*' : 'Precisa de deposito' }}
                        </li> 
                            <li style="my-1"><i class="fas fa-sun"></i> <div class="warranty d-inline-block"> 10 minutos da praia<br></div></li> 
                            <li class="d-inline-block pr-3 detail_prize my-3" style="font-size:20px;"> Preço {{$data->venda  == 1 ? 'Venda' : 'Mensal'}}: <span style="font-size:20px; font-weight:bold; "> R$ {{ str_replace('.',',', $data->price) }} </span></li>
                        </ul>   
                        <div class="row">
                            <div class="col-12 col-md-6 my-2" style="padding: 0;">
                                <span class="" style="font-weight: bold; font-size:14px; color:green;">Iténs</span>
                                <ul style="list-style:none; text-decoration:none; width:200px; margin:0; padding:0;">
                                    @foreach ( $data->itens as $value )
                                        <li>{{$value->itens->name}}</li> 
                                    @endforeach 
                                </ul>                              
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <div class="col-6" style="padding: 0;">
                                    <span class="" style="font-weight: bold; font-size:14px; color:red;">Regras</span>
                                    <ul style="list-style:none; text-decoration:none; width:200px; margin:0; padding:0;">
                                        @foreach ( $data->regras as $value )
                                            <li>{{$value->regras->descricao}}</li> 
                                        @endforeach 
                                    </ul>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-12 d-flex my-4">
                            <div class="detail_btn d-flex col-12 my-4">
                                <button class="btn_chat w-80 text-white mr-1 py-1 border-0" 
                                type="submit" 
                                value="button">
                                    <a href="https://api.whatsapp.com/send?phone={{ $data->user->phone ?? '' }}"
                                        target="_blank" style="color:#fff; text-decoration: none;">
                                            <i class="fa fa-comment-o"></i> Chamar
                                        </a>
                                </button>
        
                                    @if (Auth::check())
                                        <form action="{{ route('lista.esperaApi') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name='imovel_id' value="{{ $data->id }}">
                                            <input type="hidden" name='user_id' value="{{ Auth::user()->id }}">
                                            <button  style="font-size:14px;" class="btn_chat w-100 text-white mr-3 py-2 border-0" type="submit"
                                                value="button">
                                                <i class="fa fa-user-o"></i> Lista de espera
        
                                            </button>
                                        </form>
                                    @endif
                                </div>
                        </div>
                    </div>                    
                </div>                
            </div>
        </div>
        
    </section>
    <!--End Description -->

    

    <!-- End Testimonial -->
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
