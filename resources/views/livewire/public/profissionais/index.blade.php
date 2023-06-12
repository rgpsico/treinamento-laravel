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

                   
                    <x-select :options="config('options.select_profissionais')"   wiremodel="tipo" selected="Selecione" col='12'  />

                   
                  
                    <x-select :options="config('options.select_comunidade')"   wiremodel="place" selected="Selecione" col='12'  />

                </form>
            </div>
       
        
            <x-list-componentProfissionais :model="$model"  routeUrl="show.profissionais" pasta="imagens/entregadores/" />
       </div>
</div>
</section>
</div>
