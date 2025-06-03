<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use App\Models\Student;
use App\Models\User;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
    parent::setUp();
    $this->seed(\Database\Seeders\RoleSeeder::class); // first create the roles and permissions
    $this->withoutExceptionHandling(); // Esto es opcional, pero útil para ver errores detallados durante las pruebas

    $user = User::factory()->create();
    $user->assignRole('webAdmi','profesor'); // 2. Ahora puedes asignar el rol
    Sanctum::actingAs($user);
    }

    /** @test */
    public function it_can_create_a_student()
    {
        $payload = [
            'name'                    => 'Ronaldo Ryan',
            'birth_date'              => '2000-01-01',
            'age'                     => 24,
            'address'                 => '123 Street',
            'benefits'                => 'Ninguno',
            'dad_name'                => 'Padre Ejemplo',
            'idNumber_dad'            => '123456789',
            'dad_phone'               => '123456789',
            'mom_name'                => 'Madre Ejemplo',
            'idNumber_mom'            =>  '98765431',
            'mom_phone'               =>  '987654321',
            'emergency_contact'       => 'Tía Ana',
            'emergency_Idcontact'     => 11223344,
            'emergency_contact_phone' => '8888888888',
            'vaccine_information'     => 'Vacunas completas',
            'allergies_or_conditions' => 'Ninguna',
        ];

        $response = $this->postJson('/api/v1/students', $payload);

        $response->assertStatus(201)
                 ->assertJsonStructure(['student' => ['id', 'name', 'age']]);
    }

    /** @test */
    public function it_can_get_all_students()
    {
        Student::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/students');

        $response->assertStatus(200)
                 ->assertJsonStructure(['students']);
    }

    /** @test */
    public function it_can_show_a_student()
    {
        $student = Student::factory()->create();

        $response = $this->getJson("/api/v1/students/{$student->id}");

        $response->assertStatus(200)
                 ->assertJsonStructure(['student']);
    }

    /** @test */
    public function it_can_update_a_student()
    {
        $student = Student::factory()->create();

        $payload = [
            'name'                    => 'Nombre Actualizado',
            'birth_date'              => '2001-01-01',
            'age'                     => 23,
            'address'                 => 'Nueva dirección',
            'benefits'                => 'Comedor',
            'dad_name'                => 'Padre Nuevo',
            'idNumber_dad'            => '11111111',
            'dad_phone'               => '1111111111',
            'mom_name'                => 'Madre Nueva',
            'idNumber_mom'            => '22222222',
            'mom_phone'               => '2222222222',
            'emergency_contact'       => 'Tío Juan',
            'emergency_Idcontact'     => 55667788,
            'emergency_contact_phone' => '9999999999',
            'vaccine_information'     => 'Actualizadas',
            'allergies_or_conditions' => 'Alergia al polvo',
        ];

        $response = $this->putJson("/api/v1/students/{$student->id}", $payload);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Nombre Actualizado']);
    }

    /** @test */
    public function it_can_delete_a_student()
    {
        $student = Student::factory()->create();

        $response = $this->deleteJson("/api/v1/students/{$student->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Student deleted successfully']);
    }
}
