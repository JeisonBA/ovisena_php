<?php

namespace App\Http\Controllers;

use App\Models\ResponsableModel;
use App\Models\OvinoModel;
use Illuminate\Http\Request;
use App\Models\PesajeModel;

class PesajeController extends Controller
{
    //
    public function index()
    {
        $pesaje = PesajeModel::all();

        return view("paginas.pesaje");
    }

    public function show($Id_pesaje)
    {
        $pesaje = PesajeModel::where('Id_pesaje', $Id_pesaje)->get();
        if(count($pesaje) != 0){

            $ovino = OvinoModel::all();
            $responsable = ResponsableModel::all();

            return view("paginas.editarPesaje", array("pesajes" => $pesaje, 'datosOvino' => $ovino, 'datosResponsable' => $responsable));
        }else{
            return view("paginas.editarPesaje", array("status" => 404));
        }
    }

    //Funcion para el boton buscar
    public function buscarPesaje($textoPesaje, Request $request){
        if($request->ajax()){

            if($textoPesaje == "-"){
                $pesaje = PesajeModel::join('ovino', 'pesaje.Id_ovino', '=', 'ovino.Id_ovino')
                ->join('responsable', 'pesaje.Id_responsable', '=', 'responsable.Id_responsable')->get();
                return $pesaje;

            }else{
                $pesaje = PesajeModel::where('Nom_ovino', 'like', '%'.$textoPesaje.'%')
                ->orWhere('Nom_responsable', 'like', '%' . $textoPesaje. '%')
                ->join('ovino', 'pesaje.Id_ovino', '=', 'ovino.Id_ovino')
                ->join('responsable', 'pesaje.Id_responsable', '=', 'responsable.Id_responsable')->get();
                return $pesaje;
            }
        }
    }

    //Funcion para el boton actualizar
    public function update($Id_pesaje, Request $request)
    {

        $datosPesaje = array(
            'Fecha'          => $request->input('Fecha'),
            'Id_ovino'       => $request->input('ovino'),
            'Peso_actual'    => $request->input('Peso_actual'),
            'Peso_final'     => $request->input('Peso_final'),
            'Gdp'            => $request->input('Gdp'),
            'Id_responsable' => $request->input('responsable')
        );

        if(!empty($datosPesaje)){
            $pesaje = PesajeModel::where('Id_pesaje', $Id_pesaje)->update($datosPesaje);
            return redirect("/pesaje");
        }
    }

    //Funcion para el boton eliminar
    public function destroy($Id_pesaje){
        
        return $pesaje = PesajeModel::where("Id_pesaje", $Id_pesaje)->delete();
    }

    //Funcion para el boton agregar
    public function agregar()
    {

        $pesaje = PesajeModel::all();
        $ovino = OvinoModel::all();
        $responsable = ResponsableModel::all();

        return view('paginas.agregarPesaje', array('pesaje' => $pesaje, 'datosOvino' => $ovino, 'datosResponsable' => $responsable));
    }
    //Funcion para el boton agrgar-2
    public function store(Request $request)
    {
        $datosPesaje = array(
            "Fecha"          => $request->input("Fecha"),
            "Id_ovino"       => $request->input("Id_ovino"),
            "Peso_actual"    => $request->input("Peso_actual"),
            "Peso_final"     => $request->input("Peso_final"),
            "Gdp"            => $request->input("Gdp"),
            "Id_responsable" => $request->input("Id_responsable")
        );

        if(!empty($datosPesaje)){
            $pesaje = PesajeModel::insert($datosPesaje);
            return redirect("/pesaje");
        }
    }
}
