@extends('layouts.app')


@section('content')
    </div>

    <h1>Nome profile: {{ $data->name }}</h1>

    <ul>
       
    </ul>


    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="cart-title">
                        Permissões
                    </div>
                </div>
                <div class="card-body">
                   
                    <div class="row">
                        <div class="col">
                            <ul class="nav flex-column">
                                @foreach ($permissoes as $permissao)                             
                                <li class="nav-item">                                    
                                   {{ $permissao->name }}  <input type="checkbox" value="">
                                </li>

                              
                                @endforeach

                            </ul>
                        </div>
                       
                    </div>
                    <div class="divider"></div>
                 
                </div>
            </div>
            </div>
    </div>

    </div>
    </div>
@endsection
