@extends('layouts.app')


@section('content')
    <style>
        body {
            font-size: 12px;
        }

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

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- Carregando o Axios via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Carregando o Bootstrap via CDN -->

    <div class="container">
        <x-alert />
    </div>

    <div class="col-6 mb-2 d-flex justify-content-start align-items-start">
        <h1 class="text-dark font-weight-bold">{{ $pageTitle }}</h1>
    </div>
    <div class="col-6 mb-2 d-flex justify-content-end align-items-end">
        <a href="{{ route('espera.create') }}" class="btn btn-success">
            <i class="fas fa-home"></i>
            <span>Adicionar {{ $pageTitle }}</span></a>
    </div>

    <div class="container">
        <div class="row">
            <div class="form-group col-12 col-md-2">
                <select name="" id="" class="form-control">
                    <option value="Selecione">KitNets</option>
                    <option value="Selecione">Casas</option>
                    <option value="Selecione">Loja</option>
                </select>
            </div>

            <div class="form-group col-12 col-md-2">
                <select name="" id="" class="form-control">
                    <option value="Selecione">Status</option>
                    <option value="Selecione">Alugado</option>
                    <option value="Selecione">Vago</option>
                </select>
            </div>

            <div class="form-group col-12 col-md-2">
                <select name="" id="" class="form-control">
                    <option value="Selecione">Proprietario</option>
                    <option value="Selecione">ROger</option>
                    <option value="Selecione">Fabiane</option>
                </select>
            </div>

            <div class="form-group col-12 col-md-2">
                <select name="" id="" class="form-control">
                    <option value="Selecione">Preço</option>
                    <option value="Selecione">400</option>
                    <option value="Selecione">500</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">


            <div class="card-body">

                <h4 class="card-title text-dark">{{ $pageTitle }} <span
                        class="text-dark small">{{ count($model) }}</span></h4>
                <p class="card-description">

                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th data-field="id">#</th>
                                <th data-field="name">Nome</th>
                                <th data-field="description">Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <ul class="pagination"></ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getListaEspera() {
            return fetch('http://127.0.0.1:8000/api/listaEspera/all')
                .then(response => response.json())
                .then(data => data.data);
        }

        function renderTabela(data) {
            const tableBody = document.querySelector('tbody');

            tableBody.innerHTML = '';

            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.name}</td>
            <td>${item.description}</td>
            <td>
                <a href='espera/${item.id}/edit' class="btn btn-primary">Editar</a>
                <a href='espera/${item.id}/destroy' class="btn btn-danger">Excluir</button>
            </td>
        `;
                tableBody.appendChild(row);
            });
        }

        let sortOrder = 1; // 1 para ordenação crescente, -1 para ordenação decrescente
        let sortField = 'id'; // campo inicial de ordenação

        function sortByField(field) {
            if (sortField === field) {
                sortOrder *= -1; // inverte a ordem da ordenação se o mesmo campo for clicado novamente
            } else {
                sortOrder = 1; // reseta a ordenação para crescente se clicar em outro campo
                sortField = field;
            }

            return function(a, b) {
                if (a[field] > b[field]) {
                    return sortOrder;
                } else if (a[field] < b[field]) {
                    return -sortOrder;
                } else {
                    return 0;
                }
            }
        }


        function paginate(data, page, perPage) {
            const start = (page - 1) * perPage;
            const end = start + perPage;

            return data.slice(start, end);
        }


        function renderPaginacao(currentPage, totalPages) {
            const pagination = document.querySelector('.pagination');
            pagination.innerHTML = '';

            if (totalPages > 1) {
                for (let i = 1; i <= totalPages; i++) {
                    const li = document.createElement('li');
                    li.classList.add('page-item');
                    if (i === currentPage) {
                        li.classList.add('active');
                    }

                    const a = document.createElement('a');
                    a.classList.add('page-link');
                    a.textContent = i;
                    a.addEventListener('click', () => {
                        currentPage = i;
                        render(currentPage);
                    });

                    li.appendChild(a);
                    pagination.appendChild(li);
                }
            }
        }
        async function render(page = 1, perPage = 10) {
            const data = await getListaEspera();
            const sortedData = data.sort(sortByField(sortField));
            const paginatedData = paginate(sortedData, page, perPage);

            renderTabela(paginatedData);
            renderPaginacao(page, Math.ceil(data.length / perPage));
        }


        const headers = document.querySelectorAll('th');
        headers.forEach(header => {
            header.addEventListener('click', () => {
                const field = header.dataset.field;
                render(1, 10); // volta para a primeira página ao clicar em um header
            });
        });

        render();
    </script>
@endsection
