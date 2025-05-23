<?php

namespace App\Http\Controllers;
use App\Models\Stat;
use App\Models\User;

use Illuminate\Http\Request;

class StatController extends Controller
{
    /**
     * Show all records from table stats
     */
    public function index()
    {
        //devuelve todos los registros de la tabla stats
        $stats= Stat::all();
        // Devuelve JSON con código 200 OK
        return response()->json($stats, 200);
    }

    /**
     * Get a stat
     */
    public function show(int $id)
    {
        // Buscar el player por su id
        $stat = Stat::find($id);
        if($stat){
            // Puedes retornar una vista o una respuesta JSON, según necesites
            return response()->json($stat, 200);
        }else{
            $data = [
                'msg' => "Stat not found with id=$id",
            ];
            return response()->json($data, 404);
        }

    }
}
