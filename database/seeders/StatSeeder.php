<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stat;
use App\Models\Player;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los players
        $players = Player::all();

        // Por ejemplo, asignar aleatoriamente jugadores a equipos
        foreach ($players as $player) {
            Stat::factory()->create(['player_id'=>$player->id]);
        }
    }
}
