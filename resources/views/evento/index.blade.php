<thead>
    <tr>
        <th>#</th>
        <th>Titulo</th>
        <th>Data do Evento</th>
        <th>Status</th>
        <th>Capacidade</th>
        <th>Ações</th>
    </tr>
</thead>
<tbody>
    @foreach ($model as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->titulo ?? '' }}</td>
            <td>{{ \Carbon\Carbon::parse($value->data_evento)->format('d/m/Y') }}</td> <!-- Formatação da data -->
            <td>
                <select name="" id="status_evento" data-id='{{ $value->id }}' class="form-control">
                    <option value="1"{{ $value->status == 1 ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ $value->status == 0 ? 'selected' : '' }}>Inativo</option>
                </select>
            </td>
            <td>{{ $value->capacidade ?? '' }}</td>
            <td class="d-flex">
                <a href="{{ route($route.'.edit', ['id' => $value->id ?? '']) }}" class=" mr-2 btn btn-info" style="height:40px; padding:10px;">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route($route.'.destroy', ['id' => $value->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mr-2" type="submit" style="height:40px; padding:10px;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
