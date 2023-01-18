
<div>
@include('novo._partials.banner')
<!-- Categories -->
<section class="top_listings">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center">
<div class="col-md-7 text-center">
  <h2 class="title">Selecione o que você quer </h2>
</div>
</div>
<!-- Row  -->
<div class="row">
<form class="top_listings_search">
            


      <div class="form-group">
        <input wire:model="search" type="search" class="form-control p-form" placeholder="O que você procura">
      </div>

      <div class="form-group selectdiv">
        <select class="form-control text-truncate">
          <option selected>Tipo</option>
          <option value="1">Casa</option>
          <option value="2">KitNet</option>
          <option value="3">Loja</option>
          </select>
      </div>
              <div class="form-group selectdiv">
                <select class="form-control text-truncate " wire:model="search"  style="padding:10px;">
                  <option selected> Lugar</option>
                  <option value="0">Cantagalo</option>
                  <option value="1">Pavão</option>
                </select>
              </div>
             
              
              <div class="form-group selectdiv">
                <select class="form-control text-truncate">
                  <option selected>Preço</option>           
                  <option value="0">200</option>
                  <option value="1">300</option>
                  <option value="2">Loja</option>
                </select>
                  
              </div>
            </form>
</div>
@include('novo.components.listagemComponent')
<button class="view-btn hvr-pulse-grow" type="submit" value="button">Ver todos</button>
</div>
</div>
</section>
</div>


