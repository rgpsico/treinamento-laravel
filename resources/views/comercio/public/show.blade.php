<x-layout title="Comercio">
    <body class="iner_page">

       <x-comercio.bannercomponent nomeComercio="LOJA DO GALO"/>
       <!-- End banner --> 
       <!-- Categories -->
       <section class="top_listings">
          <div class="top_listings_sec bg-light p-b-35 p-t-0">
        
          </div>
          <div class="container">
             <!-- Row  -->
             <div class="row justify-content-center">
                <div class="col-md-7 text-center  m-b-10">
                   <h2 class="title">Produtos</h2>
                </div>
             </div>
             <!-- Row  -->
             <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                   <div class="featured-parts rounded m-t-30">
                      <div class="featured-img">
                         <img class="img-fluid rounded-top" src="images/Featured-img-1.png" alt="Classified Plus">
                         <div class="featured-new bg_warning1"> 
                            <a href="#"> Novo </a> 
                         </div>
                      </div>
                      <div class="featured-text">
                         <div class="text-top d-flex justify-content-between ">
                            <div class="heading"> 
                                <a href="#">Mobile</a> 
                            </div>
                            <div class="book-mark">
                                <a href="#"><i class="fa fa-bookmark"></i></a>
                            </div>
                         </div>
                         <div class="text-stars m-t-5">
                            <p>Smartphone for sele</p>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                         </div>
                         <div class="featured-bottum m-t-30">
                            <ul class="d-flex justify-content-between list-unstyled m-b-20">
                               <li><a href="#"><i class="fa fa-map-marker"></i> East 7th street 98 </a></li>
                               <li><a href="#"><i class="fa fa-heart-o"></i> Save</a> </li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                </div>
             </div>
             <button class="view-btn hvr-pulse-grow" type="submit" value="button">Todos</button>
          </div>
          <div class="row">
             <div class="col-md-12">
                <div class="single-sidebar m-b-50 text-center">
                   <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus">
                </div>
             </div>
          </div>
          </div>
       </section>
       <!-- End Categories --> 
       <!-- App_Store -->
       
       <!-- End App_Store -->
       <!-- Footer -->
      
       @include('layouts.novo.footer')
       <!-- End Footer -->
       <div class="top_awro pull-right" id="back-to-top" data-original-title="" title="" style="display: block;"><i class="fa fa-chevron-up" aria-hidden="true"></i> </div>
    </body>
 </x-layout>