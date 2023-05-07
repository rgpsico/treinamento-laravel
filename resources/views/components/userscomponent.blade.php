<div class="form-group col-12 col-md-2">
    <select name="users" id="users" class="form-control filtro">
        @foreach ($users as $value )           
         <option value="{{$value->id}}">{{$value->name}}</option>       
        @endforeach
    </select>
</div>