@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-body">
            <h1>DASHBOARD</h1>
            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info my-5">
                        <div class="inner">
                            <h3>{{$totalImovel}}</h3>
                            <p>Total de imoveis</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Ver imoveis
                             <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
