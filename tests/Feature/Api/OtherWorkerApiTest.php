<?php
namespace Tests\Feature\Api;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use App\Models\OtherWorker;
use App\Models\User;




class OtherWorkerApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->withoutExceptionHandling();
        // Create a user and assign roles
        $user = User::factory()->create();
        $user->assignRole('webAdmi');
        // Authenticate the user using Sanctum
        Sanctum::actingAs($user);

    }

    /** @test */
    public function it_can_create_an_OtherWorker()
    {
        $payload = [
            'name'          => 'Ronaldo Ryan',
            'idNumber'      => 123456789,
            'address'       => '123 Street',
            'phone'         => '123456789',
            'email'         => 'ronaldo.ryan@example.com',
            'section'       => 'IT',
            'conditions'    => 'nothing',
        ];

         $respondent = $this->postJson('/api/v1/otherWorkers', $payload);
         $respondent->assertStatus(200)
                    ->assertJsonStructure(['otherWorker' => ['idOtherWorker', 'name', 'idNumber']]);

    }
     /** @test */
      public function it_can_get_all_OtherWorkers()
    {
        OtherWorker::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/otherWorkers');

        $response->assertStatus(200)
                 ->assertJsonStructure(['otherWorkers']);


    }

    /** @test */
    public function it_can_show_an_OtherWorker()
    {
        $OtherWorker = OtherWorker::factory()->create();
        $response = $this->getJson("/api/v1/otherWorkers/{$OtherWorker->id}");

        $response->assertStatus(200)
                 ->assertJsonStructure(['otherWorker' => ['idOtherWorker', 'name', 'idNumber']]);

    }
    /** @test */
    public function it_can_update_an_OtherWorker()
    {
        $OtherWorker = OtherWorker::factory()->create();
        $payload = [
            'name' => 'Updated Name',
            'idNumber' => 987654321,
            'address' => '456 Avenue',
            'phone' => '987654321',
            'email' => 'Ryan@dadagmail.com',
            'section' => 'HR',
            'conditions' => 'None',
        ];

        $response = $this->putJson("/api/v1/otherWorkers/{$OtherWorker->id}", $payload);
        $response->assertStatus(200)
                 ->assertJsonStructure(['otherWorker' => ['idOtherWorker', 'name', 'idNumber']]);

     }

        /** @test */
     // Test to delete an OtherWorker
     public function it_can_delete_an_OtherWorker()
     {
         $OtherWorker = OtherWorker::factory()->create();

         $response = $this->deleteJson("/api/v1/otherWorkers/{$OtherWorker->id}");

         $response->assertStatus(200)
                  ->assertJson(['message'=> 'Other worker deleted successfully']);


      }











    }
