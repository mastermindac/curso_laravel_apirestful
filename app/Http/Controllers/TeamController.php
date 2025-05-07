<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Show all teams from table teams
     */
    public function index()
    {
        //devuelve todos los registros de la tabla players
        $teams= Team::all();
        // Devuelve JSON con código 200 OK
        return response()->json($teams, 200);
    }

    /**
     * Get a team
     */
    public function show(int $id)
    {
        // Buscar el player por su id
        $team = Team::find($id);
        if($team){
            // Puedes retornar una vista o una respuesta JSON, según necesites
            return response()->json($team, 200);
        }else{
            $data = [
                'msg' => "Team not found with id=$id",
            ];
            return response()->json($data, 404);
        }

    }

    
    /**
     * Store a team
     */
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:128',
            'category' => 'required|in:prebenjamines,benjamines,alevines,infantiles,cadete,junior,senior',
            'gender' => 'required|in:female,male,other'
        ]);

        //Insert a new team
        $team = new Team;
 
        $team->name = $validated['name'];
        $team->category = $validated['category'];
        $team->gender = $validated['gender'];
         
        $team->save();
        
        $data = ['message' => 'Team stored successfully', 'player' => $team];
        return response()->json($data, 201);

    }

    /**
     * Update a team
     */
    public function update(int $id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'sometimes|max:128',
            'category' => 'sometimes|in:prebenjamines,benjamines,alevines,infantiles,cadete,junior,senior',
            'gender' => 'sometimes|in:female,male,other'
        ]);

        // Buscar el player por su id
        $team = Team::find($id);
        if($team){
            //Si la validación es correcta actualizamos cada campo si existe
            if ($request->has('name')) {
                $team->name = $validated['name'];
            }
            if ($request->has('category')) {
                $team->category = $validated['category'];
            }
            if ($request->has('gender')) {
                $team->gender = $validated['gender'];
            }
            //Salvamos el player
            $team->save();
            $data = ['message' => 'Updated team successfully', 'team' => $team];
            return response()->json($data, 200);

        }else{
            $data = [
                'msg' => "Team not found with id=$id",
            ];
            return response()->json($data, 404);
        }

    }
    /**
     * Delete a team
     */
    public function destroy(int $id)
    {
        // Buscar el player por su id
        $team = Team::find($id);
        if($team){
            // Eliminar el team
            $team->delete();
            return response()->json([
                'msg' => "Team with id=$id deleted",
            ], 200);
        }else{
            $data = [
                'msg' => "Team not found with id=$id",
            ];
            return response()->json($data, 404);
        }
    }   
}
