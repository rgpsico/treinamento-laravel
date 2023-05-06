
<div class="col-6 mb-2 d-flex justify-content-start align-items-start">
    <h1 class="text-dark font-weight-bold">{{ $pageTitle ?? '' }}</h1>
</div>
<div class="col-6 mb-2 d-flex justify-content-end align-items-end">
    <a href="{{ route('imovel.create') }}" class="btn btn-success">
        <i class="fas fa-home"></i>
        <span>Adicionar {{ $pageTitle ?? '' }}</span></a>
</div>