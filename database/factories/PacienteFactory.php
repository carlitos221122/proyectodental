<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->name(),
            'ape_paterno'=> $this->faker->lastName(),
            'ape_materno'=> $this->faker->lastName(),
            'edad'=> $this->faker->numberBetween('-80','-18'),
           'fecha_nacimiento' => $this->faker->dateTimeBetween('-30 years', 'now'),
            'numero_telefono'=> $this->faker->phoneNumber(),
            'colonia'=> $this->faker->streetName(),
            'foto_perfil'=> $this->faker->imageUrl(640,480,
            'people',true,'Faker')   
        ];
    }
}
