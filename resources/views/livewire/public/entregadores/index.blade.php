<div>
    @include('novo._partials.banner')
    <!-- Categories -->
    <section class="top_listings">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Encontre seu imóvel ideal </h2>
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
                            <option selected>Tipo</option>
                            <option value="1">Casa</option>
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


                    <div class="form-group selectdiv">
                        <select wire:model="price" class="form-control text-truncate">
                            <option selected>Preço até</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                            <option value="600">600</option>
                            <option value="700">700</option>
                        </select>

                    </div>
                </form>
            </div>
            @include('livewire.public.entregadores._partials.listagemComponent')


        </div>
</div>
</section>
</div>
