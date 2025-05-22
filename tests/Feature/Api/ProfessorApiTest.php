<?php

namespace Tests\Feature\Api;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use App\Models\Professor;
use App\Models\User;




class ProfessorApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Autentica un usuario válido para rutas protegidas
        Sanctum::actingAs(User::factory()->create(), [], 'web');
    }

    /** @test */
    public function it_can_create_a_professor()
    {
        $payload = [
            'name'        => 'Ronaldo Ryan',
            'idNumber'    => 123456789,
            'address'     => '123 Street',
            'phone'       => '123456789',
            'email'       => 'ronaldoryanrrs@gmail.com',
            'allergies_or_conditions' => 'Ninguna',
        ];
        $response = $this->postJson('/api/v1/professors', $payload);
        $response->assertStatus(200)
                 ->assertJsonStructure(['professor' => ['id', 'name', 'idNumber']]);
    }
    /** @test */
    public function it_can_get_all_professors()
    {
        Professor::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/professors');

        $response->assertStatus(200)
                 ->assertJsonStructure(['professors']);
    }
    /** @test */
    public function it_can_show_a_professor()
    {
        $professor = Professor::factory()->create();
        $response = $this->getJson("/api/v1/professors/{$professor->id}");

        $response->assertStatus(200)
                 ->assertJsonStructure(['professor' => ['id', 'name', 'idNumber']]);
    }
    /** @test */
    public function it_can_update_a_professor()
    {
        $professor = Professor::factory()->create();
        $payload = [
            'name' => 'Updated Name',
            'idNumber' => 987654321,
            'address' => '456 Avenue',
            'phone' => '987654321',
            'email' => 'paolaB@gmail.com'

        ];

        $response = $this->putJson("/api/v1/professors/{$professor->id}", $payload);
        $response->assertStatus(200)
                 ->assertJsonStructure(['professor' => ['id', 'name', 'idNumber']]);


    }

    /** @test */
    public function it_can_delete_a_professor()
    {
        $professor = Professor::factory()->create();

        $response = $this->deleteJson("/api/v1/professors/{$professor->id}");

        $response->assertStatus(200)
                 ->assertJson(['message'=> 'Professor deleted successfully']);
    }

}
