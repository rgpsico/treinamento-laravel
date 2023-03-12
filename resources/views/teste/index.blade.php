@extends('layouts.app')


@section('content')
    <style>
        .card .card-title {
            color: #D8D9E3;
            margin-bottom: 1.5rem;
            text-transform: capitalize;
            font-size: 1.125rem;
            font-weight: 600;
        }

        .fa-plus {
            color: #D8D9E3;
        }
    </style>

    <div class="col-6 mb-2 d-flex justify-content-start align-items-start">
        <span class="text-dark font-weight-bold"></span>
    </div>
    <div class="col-6 mb-2 d-flex justify-content-end align-items-end">
        <button class="d-flex align-items-center" style="background: #0f172a; border-radius:100%;">
            <i class="fas fa-plus "></i>

        </button>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">


            <div class="card-body">

                <h4 class="card-title text-dark">Usuários <span class="text-dark small">99</span></h4>
                <p class="card-description">

                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    User
                                </th>
                                <th>
                                    First name
                                </th>
                                <th>
                                    Progress
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Deadline
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-1">
                                    <img src="../../../../images/faces/face1.jpg" alt="image">
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
