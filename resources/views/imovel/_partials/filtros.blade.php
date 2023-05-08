<div class="container">
    <div class="row">


        <x-select :options="config('options.imovel_precos')" name="Preco" label="" selected="Selecione" col='2' />

        
        <x-select :options="config('options.imovel_tipos')" name="Tipo" label="" selected="Selecione" col='2' />

        <x-select :options="config('options.imovel_status')" name="Status" label="" selected="Selecione" col='2' />

     

          <x-userscomponent typeValue="name" col="2" />

     
    </div>
</div>


<script>
    $(document).ready(function() {
        var table = $('#imovelLista').DataTable();

// Filtro Título
$("select[name='Título']").on('change', function() {
    table.column(2).search($(this).val()).draw();
});

// Filtro Preço
$("select[name='Preco']").on('change', function() {
    table.column(3).search($(this).val()).draw();
});

// Filtro Tipo
$("select[name='Tipo']").on('change', function() {
    table.column(4).search($(this).val()).draw();
});

// Filtro Status
$("select[name='Status']").on('change', function() {
    table.column(5).search($(this).val()).draw();
});

// Filtro Status Admin
$("select[name='Status_Admin']").on('change', function() {
    table.column(6).search($(this).val()).draw();
});

// Filtro Dono
$("select[name='users']").on('change', function() {
    table.column(7).search($(this).val()).draw();
});

// Filtro Data de criação
$("select[name='Data de criação']").on('change', function() {
    table.column(8).search($(this).val()).draw();
});

    });
</script>