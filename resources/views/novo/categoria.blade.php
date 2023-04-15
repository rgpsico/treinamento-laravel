<x-layout title="Categoria">
    <!-- Categories -->



    <!-- End banner -->

    <!-- Categories -->
    <section class="categories">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Buscar Serviço</h2>
                </div>
            </div>
            <!-- Row  -->
            <div class="row">

                <div class="col-md-4 m-t-30">
                    <div class="categories_box">
                        <a href="{{ route('listar.imoveis.public') }}">
                            <img src="images/Categories/categories5.png" alt="Classified Plus" />
                        </a>
                        <div class="overlay text-center">
                            <a href="{{ route('listar.imoveis.public') }}">
                                <img src="{{ asset('images/Real-Estate.png') }}" alt="Classified Plus" />
                                <p> Imoveis </p>
                            </a>
                        </div>
                    </div>
                </div>



                <div class="col-md-4 m-t-30" style="opacity: 0.7;">
                    <div class="categories_box">
                         <a href="{{route('listar.entregadores.public')}}">
                            <img src="images/Categories/categories4.png" alt="Classified Plus" />
                        <div class="overlay text-center">
                            <a href="{{route('listar.entregadores.public')}}"><img src="{{ asset('images/amburguer.png') }}" alt="Classified Plus" />
                                <p> Entregadores </p>
                            </a>
                        </div>
                    </a>
                    </div>
                </div>





                <div class="col-md-3 m-t-30" style="opacity: 0.7;">
                    <div class="categories_box"> <a href="#">
                            <img src="images/Categories/categories3.png" alt="Classified Plus" /></a>
                        <div class="overlay text-center"> <a href="#">
                                <img src="{{ asset('images/icons8-motocross-80.png') }}" alt="Classified Plus" />
                                <p> Moto Taxi </p>
                            </a> </div>
                    </div>
                </div>

                <div class="col-md-3 m-t-30" style="opacity: 0.7;">
                    <div class="categories_box"> <a href="#"><img src="images/Categories/categories6.png"
                                alt="Classified Plus" /></a>
                        <div class="overlay text-center"> <a href="#"><img src="images/Categories/Mobiles.png"
                                    alt="Classified Plus" />
                                <p> Eletronicos </p>
                            </a> </div>
                    </div>
                </div>

                <div class="col-md-3 m-t-30" style="opacity: 0.7;">
                    <div class="categories_box">
                        <a href="#">
                            <img src="images/Categories/categories6.png" alt="Classified Plus" /></a>
                        <div class="overlay text-center">
                            <a href="#">
                                <img src="images/Categories/Mobiles.png" alt="Classified Plus" />
                                <p> Material de Construção </p>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 m-t-30" style="opacity: 0.7;">
                    <div class="categories_box">
                        <a href="#">
                            <img src="images/Categories/categories6.png" alt="Classified Plus" /></a>
                        <div class="overlay text-center">
                            <a href="#">
                                <img src="images/Categories/Mobiles.png" alt="Classified Plus" />
                                <p>Salões de beleza </p>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </section>
    <div class="container" style="margin-bottom:20px;">

    </div>
    <!-- End Categories -->

    <!-- App_Store -->
    {{-- <x-AplicativoComponent /> --}}
    <!-- End App_Store -->

    <!-- Testimonial -->
    {{-- <x-DepoimentoComponent /> --}}
    <!-- End Testimonial -->

    <!-- End Testimonial -->

</x-layout>
