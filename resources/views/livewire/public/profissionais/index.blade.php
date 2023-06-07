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

                    <div class="form-group selectdiv col-5">
                        <x-select :options="config('options.select_profissionais')"  wiremodel="tipo" selected="Selecione" col='12'  />

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
       
        
            <x-list-componentProfissionais :model="$model"  routeUrl="show.profissionais" pasta="imagens/entregadores/" />



        </div>
</div>
</section>
</div>
