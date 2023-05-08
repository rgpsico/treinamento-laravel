<div class="container">
    <div class="row">


        <x-select :options="config('options.imovel_precos')" name="Preco" label="" selected="Selecione" col='2' />

        
        <x-select :options="config('options.imovel_tipos')" name="Tipo" label="" selected="Selecione" col='2' />

        <x-select :options="config('options.imovel_status')" name="Status" label="" selected="Selecione" col='2' />

     

          <x-userscomponent typeValue="name" col="2" />

     
    </div>
</div>