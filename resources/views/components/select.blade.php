@props(['options', 'name' => null, 'label', 'selected', 'col', 'data' => null, 'wiremodel' => null])

<div class="form-group selectdiv col-{{$col}} mb-4" style="padding: 1px;">
    
    @isset($label)
        <label class="labels mb-0">{{ $label }}</label>
    @endisset

  
 
    @if (isset($data) && $data != null)
    
        <select name="{{$name}}" id="{{$name}}" class="form-control text-truncate m-0" wire:model="{{$wiremodel}}">
            @foreach($options as $value => $label)
      
          
                <option value="{{ $value }}" {{ ($data[$name] == $value) ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    @else
        <select name="{{$name}}" id="{{$name}}" class="form-control text-truncate m-0" wire:model="{{$wiremodel}}">
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
