<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use JWTAuth;

class AuthTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function test_login_when_user_and_password_exist_then_response_success()
    {
        $baseUrl = Config::get('app.url') . '/api/v1/auth/login';

        $response = $this->json('POST', $baseUrl . '/', [
            'email' => 'test@test.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
    }

    public function test_me_when_user_exist_then_response_success()
    {
        $user = User::first();
        $token = JWTAuth::fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/v1/auth/me';

        $response = $this->json('POST', $baseUrl . '/', (array)'', [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }
}
