<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Show all players from table players
     */
    /**
     * Show all players from table players
     */
    public function index()
    {
        //devuelve todos los registros de la tabla players
        $players = Player::all();
        // Devuelve JSON con código 200 OK
        return response()->json($players, 200);
    }
}
