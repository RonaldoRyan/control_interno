<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OtherWorker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OtherWorker>
 */
class OtherWorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OtherWorker::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->numerify('########'),
            'name'          => $this->faker->name,
            'idNumber'      => $this->faker->numerify('########'),
            'address'       => $this->faker->address,
            'phone'         => (string) $this->faker->numerify('########'),
            'email'         =>  $this->faker->unique()->safeEmail,
            'section'       => $this->faker->word,
            'conditions'    => $this->faker->words(2, true),
        ];
    }
}
