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

    /**
     * Get a player
     */
    public function show(int $id)
    {
        // Buscar el player por su id
        $player = Player::find($id);
        if($player){
            // Puedes retornar una vista o una respuesta JSON, según necesites
            return response()->json($player, 200);
        }else{
            $data = [
                'msg' => "Player not found with id=$id",
            ];
            return response()->json($data, 404);
        }

    }
        /**
     * Get a player
     */
    public function showByFirstName(string $first_name)
    {
        // Buscar el player por su id
        $player = Player::where('first_name',$first_name)->first();
        if($player){
            // Puedes retornar una vista o una respuesta JSON, según necesites
            return response()->json($player, 200);
        }else{
            $data = [
                'msg' => "Player not found with firs_name=$first_name",
            ];
            return response()->json($data, 404);
        }

    }
}
