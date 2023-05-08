@props(['options', 'name', 'label', 'selected', 'col'])

<div class="col-{{$col}}">
    {{-- <label class="labels">{{ $label }}</label> --}}
    <select name="{{$name}}" id="{{$name}}" class="form-control">
        @foreach($options as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</div>
