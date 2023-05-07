<div class="container">
    <div class="row">
        <div class="form-group col-12 col-md-2">
            <select name="" id="tipo" class="form-control filtro">
                <option value="1">Kitnet</option>
                <option value="2">Casa</option>
                <option value="3">Loja</option>
            </select>
        </div>
        

       <x-select :options="config('options.imovel_status')" name="" label="" selected="Vago" col='2' />

         <x-userscomponent/>

         <x-select :options="config('options.imovel_precos')" name="price" label="" selected="100" col='2' />

    </div>
</div>