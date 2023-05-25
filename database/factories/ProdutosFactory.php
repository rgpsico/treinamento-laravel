<?php

namespace Database\Factories;

use App\Models\Comercio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Produtos;
use App\Models\User;

class ProdutosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Produtos::class;

    public function definition()
    {
        return [
            'comercio_id' => Comercio::factory(), // Gera uma instância de Comercio e utiliza seu ID
            'name' => $this->faker->sentence(), // Gera uma frase aleatória
            'description' => $this->faker->paragraph(), // Gera um parágrafo aleatório
            'price' => $this->faker->randomFloat(2, 1, 7), // Gera um número aleatório com duas casas decimais entre 1 e 100
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
