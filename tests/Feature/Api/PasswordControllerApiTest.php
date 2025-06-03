<?php

namespace Tests\Feature\Api;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswords;

class PasswordControllerApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_can_send_password_reset_link()
    {

       Mail::fake();
        // Create a user to test
        // the password reset functionality

        $user = User::factory()->create([
            'email' => 'jonhdoe@gmail.com',

        ]);

        $response = $this->postJson('/api/v1/password/forgot', [
            'email' => 'jonhdoe@gmail.com',


        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Password reset link sent to your email.',
            ]);




       Mail::assertSent(ForgetPasswords::class, function ($mail) use ($user) {
    return $mail->hasTo($user->email);
});

        }


    /** @test */
    public function it_can_change_password()
    {
        $user = User::factory()->create([
            'password'=> bcrypt('oldpassword'),
        ]);


         Sanctum::actingAs($user);


         $response = $this->postJson('/api/v1/password/change', [
            'current_password' => 'oldpassword',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword'
        ]);
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'La contraseña se ha cambiado con éxito',
            ]);
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));


    }


    /** @test */

    public function it_can_reset_password(){
        $user =User::factory()->create([
            'remember_token' => '123456789',
        ]);

        $response = $this->postJson('/api/v1/password/reset', [
            'token' => '123456789',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword'
        ]);
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'La contraseña se ha restablecido con éxito.',
            ]);
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }

    }

