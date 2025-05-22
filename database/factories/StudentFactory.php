<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'id'                      => $this->faker->unique()->numerify('########'),
            'name'                    => $this->faker->name,
            'birth_date'              => $this->faker->date('Y-m-d', '-6 years'),
            'age'                     => $this->faker->numberBetween(3, 10),
            'address'                 => $this->faker->address,
            'benefits'                => $this->faker->words(2, true),
            'dad_name'                => $this->faker->name('male'),
            'idNumber_dad'            => $this->faker->numerify('########'),
            'dad_phone'               => $this->faker->numerify('########'),
            'mom_name'                => $this->faker->name('female'),
            'idNumber_mom'            => $this->faker->numerify('########'),
            'mom_phone'               => $this->faker->numerify('########'),
            'emergency_contact'       => $this->faker->name,
            'emergency_Idcontact'     => $this->faker->numerify('########'),
            'emergency_contact_phone' => $this->faker->numerify('########'),
            'vaccine_information'     => $this->faker->words(3, true),
            'allergies_or_conditions' => $this->faker->words(2, true),
        ];
    }
}
