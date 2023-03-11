@extends('layouts.app')


@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Imoveis</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0" style="display: block;">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                foto
                            </th>
                            <th style="width: 30%">
                                Local
                            </th>
                            <th>
                                Preço
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%; text-align:center;">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="dados">
                        <tr>
                            <td>10</td>
                            <td><img src="" alt=""></td>
                            <td>Rampinha</td>
                            <td>400</td>
                            <td> <span class="badge badge-pill badge-danger badge-3">Alugado</span>
                            </td>


                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    Ver
                                </a>
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Editar
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Excluir
                                </a>
                            </td>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>



        </section>
    @endsection
