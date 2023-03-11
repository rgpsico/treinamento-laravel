@extends('layouts.app')


@section('content')
    <h1>Users</h1>
    <section class="container-fluid p-4">

        <div class="d-flex justify-content-end">
            <button class="btn btn-success mb-3">
                <i class="fas fa-user-plus"></i> Cadastrar
            </button>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-3">

                <select name="" id="" class="form-control">
                    <option value="">Redes</option>

                </select>
            </div>

            <div class="form-group col-12 col-md-3">

                <select name="" id="" class="form-control">
                    <option value="">Redes</option>
                </select>
            </div>

            <div class="form-group col-12 col-md-3">

                <select name="" id="" class="form-control">
                    <option value="">Redes</option>
                </select>
            </div>

            <div class="form-group col-12 col-md-3">

                <select name="" id="" class="form-control">
                    <option value="">Redes</option>
                </select>
            </div>
        </div>

        <table class="table table-striped table-advance table-hover">
            <thead>
                <tr>
                    <th><i class="fa fa-bullhorn"></i> Company</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th>
                    <th><i class="fa fa-bookmark"></i> Profit</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#">Vector Ltd</a></td>
                    <td class="hidden-phone">Lorem Ipsum dorolo imit</td>
                    <td>12120.00$ </td>
                    <td><span class="badge badge-info label-mini">Due</span></td>
                    <td>
                        <button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>

            </tbody>
        </table>
    </section>
@endsection
