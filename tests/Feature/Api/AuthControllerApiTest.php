<?php
namespace tests\Feature\Api;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


class AuthControllerApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

    }

    /** @test */
    public function it_can_register_a_user()
    {
        $payload = [
            'name' => 'Pedro Perez',
            'email' => 'PedPercencenai@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',


        ];
        //  make a petition HTTP to the api
        $response = $this->postJson('/api/v1/register', $payload);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'access_token',
            'user'=> [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ]]);

            $this->assertDatabaseHas('users', [
                'name' => $payload['name'],
                'email' => $payload['email'],
            ]);

        }


    /** @test */
    public function it_can_login_a_user()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $payload = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $response = $this->postJson('/api/v1/login', $payload);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'access_token',
                     'user' => [
                         'id',
                         'name',
                         'email',
                         'created_at',
                         'updated_at',
                     ],
                 ]);

    }


    /** @test */
    public function it_can_logout_a_user()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, [], 'web');

        $response = $this->postJson('/api/v1/logout');

        $response->assertStatus(200)
                 ->assertJson(['message' => 'User logged out successfully']);

        $this->assertGuest();
    }
}

