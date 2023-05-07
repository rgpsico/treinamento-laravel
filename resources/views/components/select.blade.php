@props(['options', 'name', 'label', 'selected', 'col'])

<div class="col-{{$col}}">
    {{-- <label class="labels">{{ $label }}</label> --}}
    <select name="{{ $name }}" class="form-control filtro">
        @foreach($options as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</div>
