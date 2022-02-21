<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class KendaraanTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_kendaraan_when_no_params_then_response_success()
    {
        $user = User::first();
        $token = JWTAuth::fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/v1/kendaraan';

        $response = $this->json('GET', $baseUrl . '/', (array)'', [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    '*' => [
                        'id',
                        'kn_nama',
                        'kn_warna',
                        'kn_harga',
                        'id_motor',
                        'id_mobil',
                        'created_at',
                        'updated_at'
                    ]
                ]
            ]);
    }

    /** @test */
    public function test_penjualan_kendaraan_when_no_params_then_response_success()
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

    /** @test */
    public function test_penjualan_perkendaraan_when_no_params_then_response_success()
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
