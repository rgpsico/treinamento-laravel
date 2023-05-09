<?php

namespace Tests\Unit;

use App\Http\Controllers\ImovelController;
use App\Http\Requests\ImovelStoreRequest;
use App\Models\Imovel;
use App\Models\ImovelItens;
use App\Models\userGallery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImovelControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        // Preparação
        $request = ImovelStoreRequest::create('/imovel', 'POST', [
            'title' => 'Imóvel de Teste',
            'type' => 1,
            'description' => 'Uma casa de teste',
            'address' => 'Rua Teste, 123',
            'user_id' => 1,
            'price' => 150000,
            'itens' => [1, 2, 3],
            'avatar' => [
                UploadedFile::fake()->image('imovel1.jpg'),
                UploadedFile::fake()->image('imovel2.jpg'),
            ],
        ]);

        // Execução
        $imovelModel = new Imovel();
        $controller = new ImovelController($imovelModel);
        $response = $controller->store($request);


        // Validação
        $this->assertDatabaseHas('imoveis', [
            'title' => 'Imóvel de Teste',
            'type' => 1,
            'description' => 'Uma casa de teste',
            'address' => 'Rua Teste, 123',
            'user_id' => 1,
            'price' => 150000,
            'status' => 0,
            'status_admin' => 0,
        ]);

        $imovel = Imovel::where('title', 'Imóvel de Teste')->first();

        $this->assertDatabaseHas('imovel_itens', [
            'imovel_id' => $imovel->id,
            'item_id' => 1,
        ]);

        $this->assertDatabaseHas('imovel_itens', [
            'imovel_id' => $imovel->id,
            'item_id' => 2,
        ]);

        $this->assertDatabaseHas('imovel_itens', [
            'imovel_id' => $imovel->id,
            'item_id' => 3,
        ]);

        // $this->assertDatabaseHas('usergallery', [
        //     'user_id' => 1,
        //     'imovel_id' => $imovel->id,
        // ]);

        //  $this->assertEquals(2, UserGallery::where('imovel_id', $imovel->id)->count());

        // $response->assertRedirect(route('imovel.create'));
        $response->assertSessionHas('success');
    }
}
