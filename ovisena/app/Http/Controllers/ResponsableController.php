<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResponsableModel;

class ResponsableController extends Controller
{
    //
    public function index(){

        return view("paginas.responsable");
    }

    public function show($Id_responsable){
        $responsable = ResponsableModel::where('Id_responsable', $Id_responsable)->get();
        if(count($responsable) != 0){
            return view("paginas.editarResponsable", array("responsables" => $responsable));
        }else{
            return view("paginas.editarResponsable", array("status" => 404));
        }
    }

    //Funcion para el boton buscar
    public function buscarResponsable($textoResponsable, Request $request){
        if($request->ajax()){

            if($textoResponsable == "-"){
                $responsable = ResponsableModel::all();
                return $responsable;

            }else{
                $responsable = ResponsableModel::where('Nom_responsable', 'like', '%'.$textoResponsable. '%')
                ->orWhere('Doc_responsable', 'like', '%'.$textoResponsable.'%')
                ->orWhere('Tipo', 'like', '%'.$textoResponsable.'%')->get();

                return $responsable;
            }
        }
    }

    //Funcion para el boton actualizar
    public function update($Id_responsable, Request $request){

        $datosResponsable = array(
            'Nom_responsable' => $request->input('Nom_responsable'),
            'Doc_responsable' => $request->input('Doc_responsable'),
            'Telefono'        => $request->input('Telefono'),
            'Tipo'            => $request->input('Tipo'),
            'Ficha'           => $request->input('Ficha')
        );

        if(!empty($datosResponsable)){
        $responsable = ResponsableModel::where('Id_responsable', $Id_responsable)->update($datosResponsable);
        return redirect("/responsable");
        }
    }

    //Funcion para el boton eliminar
    public function destroy($Id_responsable){
        
        return $responsable = ResponsableModel::where("Id_responsable", $Id_responsable)->delete();
    }

    //Funcion para el boton agregar
    public function agregar(){
        $responsable = ResponsableModel::all();
        return view('paginas.agregarResponsable', array('responsable' => $responsable));
    }
    //Funcion para el boton agrgar-2
    public function store(Request $request){
        $datosResponsable = array(
            "Nom_responsable"  => $request->input("Nom_responsable"),
            "Doc_responsable"  => $request->input("Doc_responsable"),
            "Telefono"         => $request->input("Telefono"),
            "Tipo"             => $request->input("Tipo"),
            "Ficha"            => $request->input("Ficha")
        );

        if(!empty($datosResponsable)){
            $responsable = ResponsableModel::insert($datosResponsable);
            return redirect("/responsable");
        }
    }
}
