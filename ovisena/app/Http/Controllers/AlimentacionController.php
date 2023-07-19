<?php

namespace App\Http\Controllers;

use App\Models\ResponsableModel;
use App\Models\RebanoModel;
use Illuminate\Http\Request;
use App\Models\AlimentacionModel;

class AlimentacionController extends Controller
{
    //
    public function index(){
        $alimentacion = AlimentacionModel::all();

        return view("paginas.alimentacion");
    }

    public function show($Id_alimentacion)
    {
        $alimentacion = AlimentacionModel::where('Id_alimentacion', $Id_alimentacion)->get();
        if(count($alimentacion) != 0){

            $rebano = RebanoModel::all();
            $responsable = ResponsableModel::all();

            return view("paginas.editarAlimentacion", array("alimentaciones" => $alimentacion, 'datosRebano' => $rebano, 'datosResponsable' => $responsable));
        }else{
            return view("paginas.editarAlimentacion", array("status" => 404));
        }
    }

    //Funcion para el boton buscar
    public function buscarAlimentacion($textoAlimentacion, Request $request){
        if($request->ajax()){

            if($textoAlimentacion == "-"){
                $alimentacion = AlimentacionModel::join('rebaño', 'alimentacion.Id_rebano', '=', 'rebaño.Id_rebano')
                ->join('responsable', 'alimentacion.Id_responsable', '=', 'responsable.Id_responsable')->get();
                return $alimentacion;

            }else{
                $alimentacion = AlimentacionModel::where('Tipo', 'like', '%'.$textoAlimentacion.'%')
                ->join('rebaño', 'alimentacion.Id_rebano', '=', 'rebaño.Id_rebano')
                ->join('responsable', 'alimentacion.Id_responsable', '=', 'responsable.Id_responsable')->get();
                return $alimentacion;
            }
        }
    }

    //Funcion para el boton actualizar
    public function update($Id_alimentacion, Request $request){

        $datosAlimentacion = array(
            'Fec_inicio'     => $request->input('Fec_inicio'),
            'Tipo'           => $request->input('Tipo'),
            'Cantidad'       => $request->input('Cantidad'),
            'Reporte'        => $request->input('Reporte'),
            'Id_rebano'      => $request->input('rebano'),
            'Id_responsable' => $request->input('responsable')
        );

        if(!empty($datosAlimentacion)){
        $alimentacion = AlimentacionModel::where('Id_alimentacion', $Id_alimentacion)->update($datosAlimentacion);
        return redirect("/alimentacion");
        }
    }

    //Funcion para el boton eliminar
    public function destroy($Id_alimentacion){
        
        return $alimentacion = AlimentacionModel::where("Id_alimentacion", $Id_alimentacion)->delete();
    }

    //Funcion para el boton agregar
    public function agregar(){
        
        $alimentacion = AlimentacionModel::all();
        $rebano = RebanoModel::all();
        $responsable = ResponsableModel::all();

        return view('paginas.agregarAlimentacion', array('alimentacion' => $alimentacion, 'datosRebano' => $rebano, 'datosResponsable' => $responsable));
    }
    //Funcion para el boton agregar-2
    public function store(Request $request){
        $datosAlimentacion = array(
            'Fec_inicio'     => $request->input('Fec_inicio'),
            'Tipo'           => $request->input('Tipo'),
            'Cantidad'       => $request->input('Cantidad'),
            'Reporte'        => $request->input('Reporte'),
            'Id_rebano'      => $request->input('Id_rebano'),
            "Id_responsable" => $request->input("Id_responsable")
        );

        if(!empty($datosAlimentacion)){
            $alimentacion = AlimentacionModel::insert($datosAlimentacion);
            return redirect("/alimentacion");
        }
    }
}
