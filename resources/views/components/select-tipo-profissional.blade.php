@props(['options', 'name' => null, 'label', 'selected', 'col', 'data' => null, 'wiremodel' => null])

   <select class="form-select form-controlp-form" aria-label="Tipo de Profissional" name="tipo_id" wire:model="{{$wiremodel}}">
         @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{ $tipo->id == $selected ? 'selected' : '' }}>{{ $tipo->nome }}</option>
        @endforeach
    </select>
