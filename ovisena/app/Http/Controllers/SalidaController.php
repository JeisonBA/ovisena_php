<?php

namespace App\Http\Controllers;

use App\Models\OvinoModel;
use Illuminate\Http\Request;
use App\Models\SalidaModel;

class SalidaController extends Controller
{
    //
    public function index(){
        $salida = SalidaModel::all();

        return view("paginas.salida");
    }

    public function show($Id_salida){
        $salida = SalidaModel::where('Id_salida', $Id_salida)->get();
        if(count($salida) != 0){

            $ovino = OvinoModel::all();

            return view("paginas.editarSalida", array("salidas" => $salida, 'datosOvino' => $ovino));
        }else{
            return view("paginas.editarSalida", array("status" => 404));
        }
    }

    //Funcion para el boton buscar
    public function buscarSalida($textoSalida, Request $request){
        if($request->ajax()){

            if($textoSalida == "-"){
                $salida = SalidaModel::join('ovino', 'salida.Id_ovino', '=', 'ovino.Id_ovino')
                ->select('salida.Motivo as salidaMotivo', 'Id_salida', 'Descripcion', 'Fecha',
                'ovino.Nom_ovino')->get();
                return $salida;

            }else{
                $salida = SalidaModel::where('salida.Motivo', 'like', '%'.$textoSalida.'%')
                ->orWhere('Nom_ovino', 'like', '%'.$textoSalida.'%')
                ->select('salida.Motivo as salidaMotivo', 'Id_salida', 'Descripcion', 'Fecha',
                'ovino.Nom_ovino')
                ->join('ovino', 'salida.Id_ovino', '=', 'ovino.Id_ovino')->get();
                return $salida;
            }
        }
    }

    //Funcion para el boton actualizar
    public function update($Id_salida, Request $request){

        $datosSalida = array(
            'Id_ovino'    => $request->input('ovino'),
            'Fecha'       => $request->input('Fecha'),
            'Motivo'      => $request->input('Motivo'),
            'Descripcion' => $request->input('Descripcion')
            
        );

        if(!empty($datosSalida)){
        $salida = SalidaModel::where('Id_salida', $Id_salida)->update($datosSalida);
        return redirect("/salida");
        }
    }

    //Funcion para el boton eliminar
    public function destroy($Id_salida){
        
        return $salida = SalidaModel::where("Id_salida", $Id_salida)->delete();
    }

    //Funcion para el boton agregar
    public function agregar(){

        $salida = SalidaModel::all();
        $ovino = OvinoModel::all();
        
        return view('paginas.agregarSalida', array('salida' => $salida, 'datosOvino' => $ovino));
    }
    //Funcion para el boton agrgar-2
    public function store(Request $request){
        $datosSalida = array(
            "Id_ovino"    => $request->input("Id_ovino"),
            "Fecha"       => $request->input("Fecha"),
            "Motivo"      => $request->input("Motivo"),
            "Descripcion" => $request->input("Descripcion")
        );

        if(!empty($datosSalida)){
            $salida = SalidaModel::insert($datosSalida);
            return redirect("/salida");
        }
    }
}
