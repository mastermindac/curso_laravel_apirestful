<?php

namespace App\Http\Controllers;
use App\Models\MedicalRecord;

use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    /**
     * Show all medical records from table medicalrecords
     */
    public function index()
    {
        //devuelve todos los registros de la tabla players
        $medicalrecords= MedicalRecord::all();
        // Devuelve JSON con código 200 OK
        return response()->json($medicalrecords, 200);
    }

    /**
     * Get a medical record
     */
    public function show(int $id)
    {
        // Buscar el player por su id
        $medicalrecord = MedicalRecord::find($id);
        if($medicalrecord){
            // Puedes retornar una vista o una respuesta JSON, según necesites
            return response()->json($medicalrecord, 200);
        }else{
            $data = [
                'msg' => "Medical record not found with id=$id",
            ];
            return response()->json($data, 404);
        }

    }

    /**
     * Get a player medical record
     */
    public function show_player($id)
    {
        // Buscar el player por su id
        $medicalrecord = MedicalRecord::find($id);
        if($medicalrecord){
            // Devolvemos el medical record
            return response()->json($medicalrecord->player, 200);
        }else{
            $data = [
                'msg' => "Medical record not found with id=$id",
            ];
            return response()->json($data, 404);
        }

    }
}
