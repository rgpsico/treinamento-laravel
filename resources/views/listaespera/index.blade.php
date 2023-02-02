@extends('layouts.app')


@section('content')
</div>
<style>
    body{

background-color: #eee; 
}

table th , table td{
text-align: center;
}

table tr:nth-child(even){
background-color: #e4e3e3
}

th {
background: #333;
color: #fff;
}

.pagination {
margin: 0;
}

.pagination li:hover{
cursor: pointer;
}

.header_wrap {
padding:30px 0;
}
.num_rows {
width: 20%;
float:left;
}
.tb_search{
width: 20%;
float:right;
}
.pagination-container {
width: 70%;
float:left;
}

.rows_count {
width: 20%;
float:right;
text-align:right;
color: #999;
}
</style>
<div class="container">

    <div class="row ml-1">
        <a href="{{route("espera.create")}}"   class="btn btn-success">Cadastrar na lista de espera</a>
    </div>
    <div class="header_wrap">
      <div class="num_rows">
      
              <div class="form-group"> 	
                <!-- Show Numbers Of Rows -->
                   <select class  ="form-control" name="state" id="maxRows">                      
                       <option value="10">10</option>
                       <option value="15">15</option>
                       <option value="20">20</option>
                       <option value="50">50</option>
                       <option value="70">70</option>
                       <option value="100">100</option>
                        <option value="5000">Show ALL Rows</option>
                      </select>
                   
                </div>
      </div>
      
      <div class="tb_search">
            <input type="text"
                     id="search_input_all" 
                     onkeyup="FilterkeyWord_all_table()" 
                     placeholder="Search.." 
                     class="form-control">
      </div>
    </div>

   
<table class="table table-striped table-class" id= "table-id">

  
<thead>
<tr>
      <th style="text-align: left">Id</th>
      <th style="text-align: left">Nome</th>
      <th>Ações</th>
   
  </tr>
</thead>
<tbody>
    
  @foreach ($model as $value )
  <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->name}}</td>
      <td>
        <a  href='{{route($route.'.edit',['id' => $value->id])}}' class="btn btn-info">Editar</a>
        <a  href='{{route($route.'.destroy',['id' => $value->id])}}' class="btn btn-danger">Excluir</a>
    </td>
  </tr>
  @endforeach
  <tbody>
</table>

<!--		Start Pagination -->
          <div class='pagination-container'>
              <nav>
                <ul class="pagination">
                 <!--	Here the JS Function Will Add the Rows -->
                </ul>
              </nav>
          </div>
    <div class="rows_count">TESTE</div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
@endsection
