<div class="form-group col-{{$col}}">
    <select name="users" id="users" class="form-control">
        <option selected> Selecione</option>
        @isset($users)
            @foreach ($users as $value )  
                @if($typeValue == 'name')         
                <option value="{{$value->name}}">{{$value->name}}</option>  
                @else
                <option value="{{$value->id}}">{{$value->name}}</option>  
                @endif     
            @endforeach
        @endisset
    </select>
</div>