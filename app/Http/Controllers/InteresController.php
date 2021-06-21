<?php

namespace App\Http\Controllers;

use App\Models\Interes;
use App\Models\User;
use App\Models\UsuarioInteres;
use Illuminate\Http\Request;

class InteresController extends Controller
{
    public function agegarInteres(Request $request, Interes $idInteres){

        $interesNuevo = UsuarioInteres::create([
            'idUsuario' => $request->user()->id,
            'idInteres' => $idInteres->id,
        ]);
        return response()->json([
            'interes:'=> $interesNuevo,
            'message' => 'Interes agregado con éxito'
        ]);
    }

    public function misIntereses(Request $request){
        $intereses = UsuarioInteres::where('idUsuario', $request->user()->id)->get();
        return $intereses;
    }

    public function eliminarInteres(Request $request, Interes $idInteres)
    {
        $interes = UsuarioInteres::where('idUsuario', $request->user()->id)->where('idInteres', $idInteres->id)->first();
        //return $interes;
        if($interes!=null){
            $interes->delete();
            return response()->json([
                'message' => 'Eliminado con éxito'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Error o no esta registrado ese interes'
            ]);
        }

    }

    public function getInteresesUsuario(User $idUsuario){
        $intereses = UsuarioInteres::where('idUsuario', $idUsuario->id)->get();
        return $intereses;
    }

}
