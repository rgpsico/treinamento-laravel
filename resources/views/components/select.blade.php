@props(['options', 'name', 'label', 'selected', 'col', 'data' => null])

<div class="col-{{$col}} mb-4">
    @isset($label)
        <label class="labels mb-0">{{ $label }}</label>
    @endisset

    @if (isset($data) && $data != null)
        <select name="{{$name}}" id="{{$name}}" class="form-control m-0">
            @foreach($options as $value => $label)
                <option value="{{ $value }}" {{ ($data[$name] == $value) ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    @else
        <select name="{{$name}}" id="{{$name}}" class="form-control m-0">
            @foreach($options as $value => $label)
                <option value="{{ $value }}" {{ (old($name) != null && old($name) == $value) || ($selected == $value) ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    @endif
    
    @if ($errors->has($name))
        <span class="help-block text-danger ">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
