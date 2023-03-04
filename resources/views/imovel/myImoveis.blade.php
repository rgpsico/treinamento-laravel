@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cadastrar Imovel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Cadastrar Imovel</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="card col-3">
            <a class="btn btn-success" href="{{ route('imovel.create') }}">Cadastrar Imovel</a>
        </div>
    </div>



    <div class="col-md-12 my-5">
        <form method="GET" action="{{ route('imovel.search') }}">
            @csrf
            <div class="form-row">
                <div class="col-3">
                    <label for="tipo">Tipo:</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0" {{ $request->input('type') == '0' ? 'selected' : '' }}>Kitnet</option>
                        <option value="1" {{ $request->input('type') == '1' ? 'selected' : '' }}>Casa</option>
                    </select>
                </div>

                {{-- <div class="col-3">
                <label for="comunidade">Comunidade:</label>
                <select name="comunidade" id="comunidade" class="form-control">
                  <option value="">Selecione</option>
                  <option value="cantagalo">Cantagalo</option>
                  <option value="pavão">Pavão</option>
                </select>
              </div> --}}

                {{-- <div class="col-4">
                <label for="tamanho">Tamanho:</label>
                <select name="tamanho" id="tamanho" class="form-control">
                  <option value="">Selecione</option>
                  <option value="1">1 quarto</option>
                  <option value="2">2 quartos</option>
                </select>
              </div> --}}
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>


        </form>

    </div>
    </div>

    <div class="card-group">
        <table class="table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th>Preço</th>
                    <th>Tipo</th>

                    <th>Data de criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)
                    <tr>
                        <td>
                            @if (isset($value->gallery[0]) && !is_null($value->gallery[0]))
                                <img src="{{ asset('imagens/imoveis/' . $value->gallery[0]->image) }}" width="30"
                                    height="50" class="card-img">
                            @endif
                        </td>
                        <td>{{ $value->title ?? '' }}</td>
                        <td>R${{ $value->price ?? '' }}</td>
                        <td>{{ $value->type == 1 ? 'Casa' : 'KitNet' }}</td>

                        <td>{{ $value->data_created }}</td>
                        <td>
                            <a href="{{ route('imovel.edit', ['id' => $value->id]) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('imovel.destroy', ['id' => $value->id]) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
