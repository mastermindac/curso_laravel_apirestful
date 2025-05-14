<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Show all games from table game
     */
    public function index()
    {
        //devuelve todos los registros de la tabla game
        $games= Game::all();
        // Devuelve JSON con código 200 OK
        return response()->json($games, 200);
    }

    /**
     * Get a team
     */
    public function show(int $id)
    {
        // Buscar el player por su id
        $game = Game::find($id);
        if($game){
            // Puedes retornar una vista o una respuesta JSON, según necesites
            return response()->json($game, 200);
        }else{
            $data = [
                'msg' => "Geam not found with id=$id",
            ];
            return response()->json($data, 404);
        }

    }

}
