<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RebanoModel;

class RebanoController extends Controller
{
    //
    public function index(){
        $rebano = RebanoModel::all();

        return view("paginas.rebano");
    }

    public function show($Id_rebano){
        $rebano = RebanoModel::where('Id_rebano', $Id_rebano)->get();
        if(count($rebano) != 0){
            return view("paginas.editarRebano", array("rebanos" => $rebano));
        }else{
            return view("paginas.editarRebano", array("status" => 404));
        }
    }

    //Funcion para el boton buscar
    public function buscarRebano($textoRebano, Request $request){
        if($request->ajax()){

            if($textoRebano == "-"){
                $rebano = RebanoModel::all();
                return $rebano;

            }else{
                $rebano = RebanoModel::where('Nom_rebano', 'like', '%'.$textoRebano.'%')
                ->orWhere('Cant_ovinos', 'like', '%'.$textoRebano.'%')->get();
                return $rebano;
            }
        }
    }

    //Funcion para el boton actualizar
    public function update($Id_rebano, Request $request){

        $datosRebaño = array(
            'Nom_rebano' => $request->input('Nom_rebano'),
            'Fecha'       => $request->input('Fecha'),
            'Cant_ovinos' => $request->input('Cant_ovinos')
        );

        if(!empty($datosRebaño)){
        $rebano = RebanoModel::where('Id_rebano', $Id_rebano)->update($datosRebaño);
        return redirect("/rebano");
        }
    }

    //Funcion para el boton eliminar
    public function destroy($Id_rebano){
        
        return $rebano = RebanoModel::where("Id_rebano", $Id_rebano)->delete();
    }

    public function agregar(){
        $rebano = RebanoModel::all();
        return view('paginas.agregarRebano', array('rebano' => $rebano));
    }

    public function store(Request $request){
        $datosRebaño = array(
            "Nom_rebano" => $request->input("Nom_rebano"),
            "Fecha"       => $request->input("Fecha"),
            "Cant_ovinos" => $request->input("Cant_ovinos")
        );

        if(!empty($datosRebaño)){
            $rebano = RebanoModel::insert($datosRebaño);
            return redirect("/rebano");
        }
    }
}