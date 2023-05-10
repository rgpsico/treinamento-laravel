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
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
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
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="detail_box">
                        <div class="detail_head">
                            <h1> {{ $data->title }}  <span style="font-size:29px; text-align: center; color:red; font-weight:bold; ">{{$data->venda == 1 ? '(Venda)' : '(Aluguel)'}}</span><br>
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
                        <ul class="list-unstyled d-inline-block float-left detail_left m-b-0">                                               
                            <li style="font-size:20px; margin-bottom:10px; margin-top:15px;">    
                            <i class="fas fa-money-bill"></i> {{ $data->deposito == 0 ? 'Não precisa de deposito*' : 'Precisa de deposito' }}
                        </li> 
                            <li><i class="fas fa-sun"></i><div class="warranty d-inline-block">10 minutos da praia<br></div></li> 
                            <li class="d-inline-block pr-3 detail_prize my-3" style="font-size:20px;"> Preço Mensal : </li>
                            <li class="d-inline-block Price_m detail_prize text-dark font-weight-bold" style="font-size:40px; "> R$ {{ str_replace('.',',', $data->price) }}</li>
                        </ul>   
                       
                        
                        
                        <div class="detail_bottum m-t-15">
                            <div class="row">
                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-check">
                                       
                                        <label class="form-check-label">Itens </label>                                     
                                        <div class="warranty d-inline-block">
                                            @foreach ( $data->itens as $value )
                                                <span>{{$value->itens->name}}</span> 
                                            @endforeach 
                                           
                                            <br>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 my-4">
                                    <div class="form-check">
                                        <label class="form-check-label">Regra </label>
                                        @foreach ( $data->regras as $value )
                                        <span>{{$value->itens->name}}</span> 
                                    @endforeach 

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="detail_prize p-t-10 my-5">
                            <ul class="list-unstyled">
                          

                            </ul>

                        </div>

                        <div class="detail_btn d-flex m-t-20">
                            <button class="btn_chat w-100 text-white mr-3 py-2 border-0" type="submit" value="button">
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
                                    <button class="btn_chat w-100 text-white mr-3 py-2 border-0" type="submit"
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
    </section>
    <!--End Description -->

    <!-- Description -->
    <section class="description">
        <div class="container">

            <!-- Row  -->
            <div class="row justify-content-left">
                <div class="col-md-7 text-left">
                    <h2 class="title">Resumo</h2>
                </div>
            </div>
            <!-- Row  -->

            <div class="row">
                <div class="col-md-9">
                    <div class="description_box">
                        <p>{{ $data->description }} </p>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-sidebar">
                        <img class="add_img img-fluid" src="{{ asset('images/google_adds2.png') }}"
                            alt="Classified Plus">
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End Description -->

    <!-- Top_listings -->
    <section class="top_listings">
        <div class="container">

            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center m-b-10">
                    <h2 class="title">Patrocinados</h2>
                </div>
            </div>
            <!-- Row  -->


            <div class="row">

                <div class="col-md-12">

                    <div class="single-sidebar m-b-50 m-t-50 text-center">
                        <img class="add_img img-fluid" src="{{ asset('images/discount-img.png') }}"
                            alt="{{ $data->title }}">
                    </div>

                </div>
            </div>
        </div>
    </section>

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
