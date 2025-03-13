<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
        /**
     * Test sobre endpoint /players
     */
    public function test_index_PlayerController_getPlayers_ReturnStatus200(): void
    {
        $ver = env("APP_VER");
        $response = $this->get("/{$ver}/players");
        $response->assertStatus(200);
    }
}
