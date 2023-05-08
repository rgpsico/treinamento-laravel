@extends('layouts.app')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

@section('content')
  <link rel="stylesheet" href=" {{asset('css/ppg/imovel.css')}}">


<x-datatables_resources/>

    <div class="container">
        <x-alert/>
    </div>

    @include('imovel._partials.header')
   @include('imovel._partials.filtros')

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">


            <div class="card-body">

                <div class="row">
                    <h4 class="card-title text-dark">Imoveis
                        <span class="text-dark small">{{ count($data) }}</span>
                    </h4>
                </div>

                <div class="row">
                    <div class="form-group col-3">
                        <label for="acao_imoveiss">Ação</label>
                        <select name="acao_imoveiss" id="" class="form-control">
                            <option value="update">Atualizar</option>
                            <option value="excluir">Excluir</option>
                        </select>
                    </div>

                    <div class="form-group col-2">
                        <form action="">
                            <button id="acao_imoveis" class="btn btn-success my-4">Enviar</button>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped" id="imovelLista">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="" id="marcarTodos"></th>
                                <th>Imagem</th>
                                <th>Título</th>
                                <th>Preço</th>
                                <th>Tipo</th>
                                <th>Status</th>
                                <th>Status Admin</th>
                                <th>Dono</th>
                                <th>Data de criação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="imoveis_body">
                            @foreach ($data as $value)
                                <tr>
                                    <td><input type="checkbox" data-id="{{ $value->id }}" name="checkboxImovel"
                                            id="checkboxImovel"></td>
                                    <td>
                                        @if (isset($value->gallery[0]) && !is_null($value->gallery[0]))
                                            <img src="{{ asset('imagens/imoveis/' . $value->gallery[0]->image) }}"
                                                width="30" height="50" class="card-img">
                                        @endif
                                    </td>
                                    <td>{{ $value->title ?? '' }}</td>
                                    <td>R${{ $value->price ?? '' }}</td>
                                    <td>{{ $value->type == 1 ? 'Casa' : 'KitNet' }}</td>
                                    <td class='{{ $value->status == 1 ? 'red' : 'gren' }}'>
                                        {{ $value->status == 1 ? 'Alugado' : 'Livre' }}</td>
                                    <td class='{{ $value->status_admin == 1 ? 'red' : 'green' }}'>
                                        <select name="status_admin" data-id='{{ $value->id }}' id="status_admin"
                                            class="form-control">
                                            @foreach (['ativo', 'inativo'] as $key => $status)
                                                <option value="{{ $key }}"
                                                    {{ $key == $value->status_admin ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>{{$value->user->name}}</td>
                                    <td>{{ date('d/m/Y', strtotime($value->created_at)) }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('imovel.show', ['id' => $value->id]) }}"
                                            class=" mr-2 btn btn-dark" style="height:40px; padding:10px;">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('imovel.edit', ['id' => $value->id]) }}"
                                            class=" mr-2 btn btn-info" style="height:40px; padding:10px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('imovel.destroy', ['id' => $value->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mr-2" type="submit"
                                                style="height:40px; padding:10px;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script> 
     const deleteSelectedUrl = '{{ route('delete-selected') }}';
    </script>
    <script src='{{asset('js/imoveis/index.js')}}'></script>

@endsection
