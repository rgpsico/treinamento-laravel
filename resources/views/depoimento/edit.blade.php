@extends('layouts.app')

@section('content')
    <div class="container rounded bg-white ">
        <x-alert />
        <div class="row">

            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Editar Depoimento</h4>
                    </div>
                    <div class="row mt-2">
                        <form action="{{ route('depoimento.update', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label class="labels">Author</label>
                                <input type="text" class="form-control" placeholder="autor" name="autor"
                                    value="{{ $data->autor }}">
                            </div>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Depoimento </label>
                        <input type="text" class="form-control" name="depoimento" placeholder="depoimento"
                            value="{{ $data->depoimento }}">
                    </div>

                </div>

                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Salvar</button>
                </div>
            </div>
            </form>
        </div>

    </div>
    </div>
    </div>
    </div>
@endsection
