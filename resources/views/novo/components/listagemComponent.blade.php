<style>
    .sponsored-img {
        position: absolute;
        top: 0;
        left: 0;
    }
</style>
<div class="row">

    @foreach ($datas as $data)
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="featured-parts rounded m-t-30">
                <a href="{{ route('detalhes', ['id' => $data->id]) }}">
                    @php $img = $data->gallery[0]->image  ?? '' @endphp
                    <div class="featured-img">
                        <img style="max-width:100%; height:200px;" class="img-fluid rounded-top"
                            src="{{ asset('imagens/imoveis/' . $img) }}" alt="{{ $data->title }}" />

                        <img class="sponsored-img" src="{{ asset('images/ads/ads.png') }}" alt="Sponsored Image"
                            style="position:absolute; top:0; left:0;">
                    </div>
                </a>
                <div class="featured-text">
                    <div class="text-top d-flex justify-content-between">
                        <div class="heading">
                            <a href="{{ route('detalhes', ['id' => $data->id]) }}">{{ $data->title }}</a>
                        </div>
                        <div class="book-mark">
                            <a href="{{ route('detalhes', ['id' => $data->id]) }}">
                                <i class="fa fa-bookmark"></i></a>
                        </div>
                    </div>
                    <div class="text-stars m-t-5">
                        <p>{{ $data->description }}</p>
                        <p><b>Preço:</b>{{ $data->price }}</p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="featured-bottum m-t-30">
                        <ul class="d-flex justify-content-between list-unstyled m-b-20">
                            <li><a href="#">
                                    <i class="fa fa-map-marker"></i> {{ $data->address }}</a></li>
                            <li><a href="#">
                                    <i class="fa fa-heart-o"></i> Save</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<button class="view-btn hvr-pulse-grow" wire:click="todos">Ver todos</button>
