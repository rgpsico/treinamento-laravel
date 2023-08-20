
<x-layout title="Detalhes">
<style>
    .cbh-phone{display:block;position:fixed; right:-0px;
  bottom: 0; visibility:hidden;background-color:transparent;width:200px;height:200px;cursor:pointer;z-index:999;-webkit-backface-visibility:hidden;-webkit-transform:translateZ(0);-webkit-transition:visibility .5s;-moz-transition:visibility .5s;-o-transition:visibility .5s;transition:visibility .5s}
  .cbh-phone.cbh-show{visibility:visible}@-webkit-keyframes fadeInRight{0%{opacity:0;-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}100%{opacity:1;-webkit-transform:none;transform:none}}@keyframes fadeInRight{0%{opacity:0;-webkit-transform:translate3d(100%,0,0);-ms-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}100%{opacity:1;-webkit-transform:none;-ms-transform:none;transform:none}}@-webkit-keyframes fadeInRightBig{0%{opacity:0;-webkit-transform:translate3d(2000px,0,0);transform:translate3d(2000px,0,0)}100%{opacity:1;-webkit-transform:none;transform:none}}@-webkit-keyframes fadeOutRight{0%{opacity:1}100%{opacity:0;-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}}@keyframes fadeOutRight{0%{opacity:1}100%{opacity:0;-webkit-transform:translate3d(100%,0,0);-ms-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}}.fadeOutRight{-webkit-animation-name:fadeOutRight;animation-name:fadeOutRight}
  .cbh-phone.cbh-static1{opacity:.6}
  .cbh-phone.cbh-hover1{opacity:1}
  .cbh-ph-circle{width:110px;height:110px;top:40px;left:40px;position:absolute;background-color:transparent;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;border:2px solid rgba(30,30,30,.4);opacity:.1;-webkit-animation:cbh-circle-anim 1.2s infinite ease-in-out;-moz-animation:cbh-circle-anim 1.2s infinite ease-in-out;-ms-animation:cbh-circle-anim 1.2s infinite ease-in-out;-o-animation:cbh-circle-anim 1.2s infinite ease-in-out;animation:cbh-circle-anim 1.2s infinite ease-in-out;-webkit-transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;transition:all .5s}
  .cbh-phone.cbh-active .cbh-ph-circle1{-webkit-animation:cbh-circle-anim 1.1s infinite ease-in-out!important;-moz-animation:cbh-circle-anim 1.1s infinite ease-in-out!important;-ms-animation:cbh-circle-anim 1.1s infinite ease-in-out!important;-o-animation:cbh-circle-anim 1.1s infinite ease-in-out!important;animation:cbh-circle-anim 1.1s infinite ease-in-out!important}
  .cbh-phone.cbh-static .cbh-ph-circle{-webkit-animation:cbh-circle-anim 2.2s infinite ease-in-out!important;-moz-animation:cbh-circle-anim 2.2s infinite ease-in-out!important;-ms-animation:cbh-circle-anim 2.2s infinite ease-in-out!important;-o-animation:cbh-circle-anim 2.2s infinite ease-in-out!important;animation:cbh-circle-anim 2.2s infinite ease-in-out!important}
  .cbh-phone.cbh-hover .cbh-ph-circle{border-color:rgba(0,175,242,1);opacity:.5}
  .cbh-phone.cbh-green.cbh-hover .cbh-ph-circle{border-color:rgba(117,235,80,1);opacity:.5}
  .cbh-phone.cbh-green .cbh-ph-circle{border-color:rgba(0,175,242,1);opacity:.5}
  .cbh-phone.cbh-gray.cbh-hover .cbh-ph-circle{border-color:rgba(204,204,204,1);opacity:.5}
  .cbh-phone.cbh-gray .cbh-ph-circle{border-color:rgba(117,235,80,1);opacity:.5}
  .cbh-ph-circle-fill{width:74px;height:74px;top:58px;left:58px;position:absolute;background-color:#000;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;border:2px solid transparent;opacity:.1;-webkit-animation:cbh-circle-fill-anim 2.3s infinite ease-in-out;-moz-animation:cbh-circle-fill-anim 2.3s infinite ease-in-out;-ms-animation:cbh-circle-fill-anim 2.3s infinite ease-in-out;-o-animation:cbh-circle-fill-anim 2.3s infinite ease-in-out;animation:cbh-circle-fill-anim 2.3s infinite ease-in-out;-webkit-transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;transition:all .5s}
  .cbh-phone.cbh-active .cbh-ph-circle-fill{-webkit-animation:cbh-circle-fill-anim 1.7s infinite ease-in-out!important;-moz-animation:cbh-circle-fill-anim 1.7s infinite ease-in-out!important;-ms-animation:cbh-circle-fill-anim 1.7s infinite ease-in-out!important;-o-animation:cbh-circle-fill-anim 1.7s infinite ease-in-out!important;animation:cbh-circle-fill-anim 1.7s infinite ease-in-out!important}
  .cbh-phone.cbh-static .cbh-ph-circle-fill{-webkit-animation:cbh-circle-fill-anim 2.3s infinite ease-in-out!important;-moz-animation:cbh-circle-fill-anim 2.3s infinite ease-in-out!important;-ms-animation:cbh-circle-fill-anim 2.3s infinite ease-in-out!important;-o-animation:cbh-circle-fill-anim 2.3s infinite ease-in-out!important;animation:cbh-circle-fill-anim 2.3s infinite ease-in-out!important;opacity:0!important}         .cbh-phone.cbh-hover .cbh-ph-circle-fill{background-color:rgba(0,175,242,.5);opacity:.75!important}
  .cbh-phone.cbh-green.cbh-hover .cbh-ph-circle-fill{background-color:rgba(117,235,80,.5);opacity:.75!important}
  .cbh-phone.cbh-green .cbh-ph-circle-fill{background-color:rgba(0,175,242,.5);opacity:.75!important}
  .cbh-phone.cbh-gray.cbh-hover .cbh-ph-circle-fill{background-color:rgba(204,204,204,.5);opacity:.75!important}
  .cbh-phone.cbh-gray .cbh-ph-circle-fill{background-color:rgba(117,235,80,.5);opacity:1!important}
  .cbh-ph-img-circle1{width:50px;height:50px;top:70px;left:70px;position:absolute;background-image:url(https://360imagem.com/google/images/wpp-icon.png);background-size: 40px 40px;background-color:rgba(30,30,30,.1);background-position:center center;background-repeat:no-repeat;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;border:2px solid transparent;opacity:1;-webkit-animation:cbh-circle-img-anim 1s infinite ease-in-out;-moz-animation:cbh-circle-img-anim 1s infinite ease-in-out;-ms-animation:cbh-circle-img-anim 1s infinite ease-in-out;-o-animation:cbh-circle-img-anim 1s infinite ease-in-out;animation:cbh-circle-img-anim 1s infinite ease-in-out}
  .cbh-phone.cbh-active .cbh-ph-img-circle1{-webkit-animation:cbh-circle-img-anim 1s infinite ease-in-out!important;-moz-animation:cbh-circle-img-anim 1s infinite ease-in-out!important;-ms-animation:cbh-circle-img-anim 1s infinite ease-in-out!important;-o-animation:cbh-circle-img-anim 1s infinite ease-in-out!important;animation:cbh-circle-img-anim 1s infinite ease-in-out!important}
  .cbh-phone.cbh-static .cbh-ph-img-circle1{-webkit-animation:cbh-circle-img-anim 0s infinite ease-in-out!important;-moz-animation:cbh-circle-img-anim 0s infinite ease-in-out!important;-ms-animation:cbh-circle-img-anim 0s infinite ease-in-out!important;-o-animation:cbh-circle-img-anim 0s infinite ease-in-out!important;animation:cbh-circle-img-anim 0s infinite ease-in-out!important}
  .cbh-phone.cbh-hover .cbh-ph-img-circle1{background-color:rgba(0,175,242,1)}
  .cbh-phone.cbh-green.cbh-hover .cbh-ph-img-circle1:hover{background-color:rgba(117,235,80,1)}
  .cbh-phone.cbh-green .cbh-ph-img-circle1{background-color:rgba(0,175,242,1)}
  .cbh-phone.cbh-green .cbh-ph-img-circle1{background-color:rgba(0,175,242,1)}
  .cbh-phone.cbh-gray.cbh-hover .cbh-ph-img-circle1{background-color:rgba(204,204,204,1)}
  .cbh-phone.cbh-gray .cbh-ph-img-circle1{background-color:rgba(117,235,80,1)}@-moz-keyframes cbh-circle-anim{0%{-moz-transform:rotate(0deg) scale(0.5) skew(1deg);opacity:.1;-moz-opacity:.1;-webkit-opacity:.1;-o-opacity:.1}30%{-moz-transform:rotate(0deg) scale(.7) skew(1deg);opacity:.5;-moz-opacity:.5;-webkit-opacity:.5;-o-opacity:.5}100%{-moz-transform:rotate(0deg) scale(1) skew(1deg);opacity:.6;-moz-opacity:.6;-webkit-opacity:.6;-o-opacity:.1}}@-webkit-keyframes cbh-circle-anim{0%{-webkit-transform:rotate(0deg) scale(0.5) skew(1deg);-webkit-opacity:.1}30%{-webkit-transform:rotate(0deg) scale(.7) skew(1deg);-webkit-opacity:.5}100%{-webkit-transform:rotate(0deg) scale(1) skew(1deg);-webkit-opacity:.1}}@-o-keyframes cbh-circle-anim{0%{-o-transform:rotate(0deg) kscale(0.5) skew(1deg);-o-opacity:.1}30%{-o-transform:rotate(0deg) scale(.7) skew(1deg);-o-opacity:.5}100%{-o-transform:rotate(0deg) scale(1) skew(1deg);-o-opacity:.1}}@keyframes cbh-circle-anim{0%{transform:rotate(0deg) scale(0.5) skew(1deg);opacity:.1}30%{transform:rotate(0deg) scale(.7) skew(1deg);opacity:.5}100%{transform:rotate(0deg) scale(1) skew(1deg);opacity:.1}}@-moz-keyframes cbh-circle-fill-anim{0%{-moz-transform:rotate(0deg) scale(0.7) skew(1deg);opacity:.2}50%{-moz-transform:rotate(0deg) -moz-scale(1) skew(1deg);opacity:.2}100%{-moz-transform:rotate(0deg) scale(0.7) skew(1deg);opacity:.2}}@-webkit-keyframes cbh-circle-fill-anim{0%{-webkit-transform:rotate(0deg) scale(0.7) skew(1deg);opacity:.2}50%{-webkit-transform:rotate(0deg) scale(1) skew(1deg);opacity:.2}100%{-webkit-transform:rotate(0deg) scale(0.7) skew(1deg);opacity:.2}}@-o-keyframes cbh-circle-fill-anim{0%{-o-transform:rotate(0deg) scale(0.7) skew(1deg);opacity:.2}50%{-o-transform:rotate(0deg) scale(1) skew(1deg);opacity:.2}100%{-o-transform:rotate(0deg) scale(0.7) skew(1deg);opacity:.2}}@keyframes cbh-circle-fill-anim{0%{transform:rotate(0deg) scale(0.7) skew(1deg);opacity:.2}50%{transform:rotate(0deg) scale(1) skew(1deg);opacity:.2}100%{transform:rotate(0deg) scale(0.7) skew(1deg);opacity:.2}}@keyframes cbh-circle-img-anim{0%{transform:rotate(0deg) scale(1) skew(1deg)}10%{transform:rotate(-25deg) scale(1) skew(1deg)}20%{transform:rotate(25deg) scale(1) skew(1deg)}30%{transform:rotate(-25deg) scale(1) skew(1deg)}40%{transform:rotate(25deg) scale(1) skew(1deg)}100%,50%{transform:rotate(0deg) scale(1) skew(1deg)}}@-moz-keyframes cbh-circle-img-anim{0%{transform:rotate(0deg) scale(1) skew(1deg)}10%{-moz-transform:rotate(-25deg) scale(1) skew(1deg)}20%{-moz-transform:rotate(25deg) scale(1) skew(1deg)}30%{-moz-transform:rotate(-25deg) scale(1) skew(1deg)}40%{-moz-transform:rotate(25deg) scale(1) skew(1deg)}100%,50%{-moz-transform:rotate(0deg) scale(1) skew(1deg)}}@-webkit-keyframes cbh-circle-img-anim{0%{-webkit-transform:rotate(0deg) scale(1) skew(1deg)}10%{-webkit-transform:rotate(-25deg) scale(1) skew(1deg)}20%{-webkit-transform:rotate(25deg) scale(1) skew(1deg)}30%{-webkit-transform:rotate(-25deg) scale(1) skew(1deg)}40%{-webkit-transform:rotate(25deg) scale(1) skew(1deg)}100%,50%{-webkit-transform:rotate(0deg) scale(1) skew(1deg)}}@-o-keyframes cbh-circle-img-anim{0%{-o-transform:rotate(0deg) scale(1) skew(1deg)}10%{-o-transform:rotate(-25deg) scale(1) skew(1deg)}20%{-o-transform:rotate(25deg) scale(1) skew(1deg)}30%{-o-transform:rotate(-25deg) scale(1) skew(1deg)}40%{-o-transform:rotate(25deg) scale(1) skew(1deg)}100%,50%{-o-transform:rotate(0deg) scale(1) skew(1deg)}}
  .cbh-ph-img-circle1 {}
  .cbh-phone.cbh-green .cbh-ph-circle {border-color: rgb(0, 242, 164)}
  .cbh-phone.cbh-green .cbh-ph-circle-fill {background-color: rgb(0, 242, 164);}
  .cbh-phone.cbh-green .cbh-ph-img-circle1 {background-color:rgb(46, 203, 113);}

  .kmacb__manager-border {
    position: absolute;
    width: 75px;
    height: 75px;
    top: 0%;
    left: 50%;
    margin-top: -39.5px;
    margin-left: -39.5px;
    border-radius: 100%;
    border: 2px solid #ffe787;
    -webkit-animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    -moz-animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    -ms-animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    -o-animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    animation: kmacb__manager-border-anim 1.5s ease-in-out .5s infinite;
    opacity: .8;
    transform-origin: center;
  }
  .kmacb__manager-fill {
    background: #52aff7 center bottom no-repeat;
    position: absolute;
    width: 75px;
    height: 75px;
    top: 50%;
    left: 50%;
    margin-top: -37.5px;
    margin-left: -37.5px;
    border-radius: 100%;
    opacity: .5;
    -webkit-animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    -moz-animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    -ms-animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    -o-animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    animation: kmacb__manager-fill-anim 1.5s ease-in-out infinite;
    transform-origin: center;
  }
  .kmacb__manager-circle {
    background: #52aff7;
    position: absolute;
    width: 120px;
    height: 120px;
    top: 50%;
    right: 50%;
    margin-top: -60px;
    margin-left: -60px;
    border-radius: 100%;
  }
</style>

    <section class="about_us">
        <div class="container"> 
          <!-- Row  -->
          <div class="row">
            <div class="col-md-5 text-left m-t-50">
                <img src="{{asset('imagens/entregadores/'.$model->avatar)}}" alt="Classified Plus" class="card-img">
              </div>
            <div class="col-md-7">
              <h2 class="title">Serviços</h2>
              <div class="clearfix"></div>
              <p class="p-t-30 mb-4">Entregadores multifuncionais realizam entregas, removem entulhos, compram pães, efetuam compras e prestam favores variados, agindo como auxiliares versáteis para atender às necessidades do dia a dia. Eles se esforçam para oferecer comodidade e eficiência.</p>
              <div class="phone-call cbh-phone cbh-green cbh-show  cbh-static" id="clbh_phone_div" style="">
                <a id="WhatsApp-button" href="https://wa.me/{{$model->telefone}}" target="_blank" class="phoneJs" title="WhatsApp 360imagem">
                <div class="cbh-ph-circle"></div>
                <div class="cbh-ph-circle-fill"></div>
                <div class="cbh-ph-img-circle1"></div>
            </a>
            </div> 
              <ul class="list-unstyled p-0 m-t-20">
                {{-- <li>veniam, quis nostrud exercitation ullamco laboris nisi commodo consequat. </li>
                <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum fugiat </li>
                <li>nulla pariatur. Excepteur dolore magna aliqua. </li>
                <li>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </li>
                <li>consequat.  sint occaecat cupidatat non proident, sunt in culpa</li>
                <li>qui officia deserunt mollit anim id est Lorem ipsum dolor sit amet, </li>
                <li>consectetur adipisicing elit, sed do eiusmod tempor incididunt </li>
                <li>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</li>
                <li>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li> --}}
              </ul>
            </div>
                  
          </div>
          </div>
      </section>
      
</x-layout>

<script>
     $(".card-img").on("error", function(){
        $(this).attr('src', '{{ asset("images/entregadoravatar.png") }}');
    });
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
