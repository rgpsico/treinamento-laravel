<div>
    <x-banners-component title="Comércio" />
    <!-- Categories -->
    <section class="top_listings">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Buscar Comércio </h2>
                </div>
            </div>
            <!-- Row  -->
            <div class="row">
                <form class="top_listings_search">



                    <div class="form-group">
                        <input wire:model="search" type="search" class="form-control p-form"
                            placeholder="O que você procura">
                    </div>

                    <div class="form-group selectdiv">
                        <select wire:model="type" class="form-control text-truncate">
                            <option selected>Tipo de Comércio</option>
                            <option value="1">Super</option>
                            <option value="2">KitNet</option>
                            <option value="3">Loja</option>
                        </select>
                    </div>
                    <div class="form-group selectdiv">
                        <select class="form-control text-truncate " wire:model="place" style="padding:10px;">
                            <option selected value="">Comunidade</option>

                            <option value="cantagalo">Cantagalo</option>
                            <option value="pavao">Pavão</option>
                        </select>
                    </div>                   
                </form>
            </div>
          
            <x-list-component :model="$model" routeUrl="show.comercio" pasta="imagens/comercio/" />


        </div>
</div>
</section>
</div>
