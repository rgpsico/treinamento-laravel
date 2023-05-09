<?php

namespace Tests\Unit;

use App\Http\Controllers\ItensController;
use App\Models\Itens;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Testing\TestResponse as TestingTestResponse;

class ItensControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        // Preparação
        $request = Request::create('/itens', 'POST', [
            'name' => 'Item de Teste',
            'descricao' => 'Uma descrição de teste',
        ]);

        // Execução
        $itensModel = new Itens();
        $controller = new ItensController($itensModel);
        $response = TestingTestResponse::fromBaseResponse($controller->store($request));

        // Validação
        $this->assertDatabaseHas('itens', [
            'name' => 'Item de Teste',
            'descricao' => 'Uma descrição de teste',
        ]);

        $response->assertRedirect(route('itens.index'));
        $response->assertSessionHas('success');
    }
}
