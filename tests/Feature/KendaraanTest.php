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
                        'nama',
                        'warna',
                        'harga',
                        'stok'
                    ]
                ]
            ]);
    }

    /** @test */
    public function test_penjualan_kendaraan_when_no_params_then_response_success()
    {
        $user = User::first();
        $token = JWTAuth::fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/v1/kendaraan/penjualan-kendaraan';

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
                        'nama',
                        'warna',
                        'terjual'
                    ]
                ]
            ]);
    }

    /** @test */
    public function test_penjualan_perkendaraan_when_no_params_then_response_success()
    {
        $user = User::first();
        $token = JWTAuth::fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/v1/kendaraan/penjualan-perkendaraan';

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
                        'nama',
                        'warna',
                        'harga',
                        'terjual',
                        'total'
                    ]
                ]
            ]);
    }
}
