<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Comercio;
use App\Models\User;

class ComercioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Comercio::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'avatar' => $this->faker->imageUrl(), // Gerando uma URL de imagem aleatória
            'nome' => $this->faker->company, // Gerando um nome de empresa aleatório
            'telefone' => $this->faker->phoneNumber, // Gerando um número de telefone aleatório
            'status' => $this->faker->randomElement(['ativo', 'inativo']), // Gerando um status aleatório
            'endereco' => $this->faker->address, // Gerando um endereço aleatório
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
