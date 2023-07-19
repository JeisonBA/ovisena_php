<?php

namespace App\Http\Controllers;

use App\Models\ResponsableModel;
use App\Models\RebanoModel;
use Illuminate\Http\Request;
use App\Models\OvinoModel;
use App\Models\PartoModel;
use App\Models\PesajeModel;
use App\Models\SalidaModel;
use App\Models\SanidadModel;

class OvinoController extends Controller
{
    //
    public function index()
    {
        $ovino = OvinoModel::all();

        return view("paginas.ovino");
    }

    public function show($Id_ovino)
    {
        $ovino = OvinoModel::where('Id_ovino', $Id_ovino)->get();
        if (count($ovino) != 0) {

            $responsable = ResponsableModel::all();
            $rebano = RebanoModel::all();

            return view("paginas.editarOvino", array("ovinos" => $ovino, 'datosResponsable' => $responsable, 'datosRebano' => $rebano));
        } else {
            return view("paginas.editarOvino", array("status" => 404));
        }
    }

    //Funcion para el boton buscar
    public function buscarOvino($textoOvino, Request $request)
    {
        if ($request->ajax()) {

            $ovinoToSend = array();

            if ($textoOvino == "-") {
                $ovino = OvinoModel::join('responsable', 'ovino.Id_responsable', '=', 'responsable.Id_responsable')
                    ->join('rebaño', 'ovino.Id_rebano', '=', 'rebaño.Id_rebano')->get();

                foreach ($ovino as $key => $ovino) {
                    $ovinoToSend[$key] = $ovino;
                    if ($ovino->salida || $ovino->partoM || $ovino->partoP || $ovino->pesaje || $ovino->sanidad) {
                        $ovinoToSend[$key]['borrar'] = 'no';
                    } else {
                        $ovinoToSend[$key]['borrar'] = 'si';
                    }
                }
                return $ovinoToSend;
            } else {
                $ovino = OvinoModel::where('Num_consecutivo', 'like', '%' . $textoOvino . '%')
                    ->orWhere('Nom_ovino', 'like', '%' . $textoOvino . '%')
                    ->orWhere('Sexo', 'like', '%' . $textoOvino . '%')
                    ->orWhere('Categoria', 'like', '%' . $textoOvino . '%')
                    ->orWhere('ovino.Motivo', 'like', '%' . $textoOvino . '%')
                    ->join('rebaño', 'ovino.Id_rebano', '=', 'rebaño.Id_rebano')
                    ->join('responsable', 'ovino.Id_responsable', '=', 'responsable.Id_responsable')->get();
//64
                foreach ($ovino as $key => $ovino) {
                    if ($ovino->salida || $ovino->partoM || $ovino->partoP || $ovino->pesaje || $ovino->sanidad) {
                        $ovinoToSend[$key] = $ovino;
                        $ovinoToSend[$key]['borrar'] = 'no';
                    } else {
                        $ovinoToSend[$key] = $ovino;
                        $ovinoToSend[$key]['borrar'] = 'si';
                    }
                }
                return $ovinoToSend;
            }
        }
    }

    //Funcion para el boton actualizar
    public function update($Id_ovino, Request $request)
    {

        $datosOvino = array(
            'Num_consecutivo' => $request->input('Num_consecutivo'),
            'Nom_ovino'       => $request->input('Nom_ovino'),
            'Fec_nacimiento'  => $request->input('Fec_nacimiento'),
            'Raza'            => $request->input('Raza'),
            'Sexo'            => $request->input('Sexo'),
            'Categoria'       => $request->input('Categoria'),
            'Motivo'          => $request->input('Motivo'),
            // 'Peso_nacimiento' => $request->input('Peso_nacimiento'),
            'Peso_actual'     => $request->input('Peso_actual'),
            // 'Gdp'             => $request->input('Gdp'),
            'Id_responsable'  => $request->input('responsable'),
            'Id_rebano'       => $request->input('rebano')
        );

        if (!empty($datosOvino)) {
            $ovino = OvinoModel::where('Id_ovino', $Id_ovino)->update($datosOvino);
            return redirect("/ovino");
        }
    }

    //Funcion para el boton eliminar
    public function destroy($Id_ovino)
    {
        return $ovino = OvinoModel::where("Id_ovino", $Id_ovino)->delete();
    }

    //Funcion para el boton agregar
    public function agregar()
    {

        $ovino = OvinoModel::all();
        $responsable = ResponsableModel::all();
        $rebano = RebanoModel::all();

        return view('paginas.agregarOvino', array('ovino' => $ovino, 'datosResponsable' => $responsable, 'datosRebano' => $rebano));
    }
    //Funcion para el boton agregar-2
    public function store(Request $request)
    {
        $datosOvino = array(
            "Num_consecutivo"   => $request->input("Num_consecutivo"),
            "Nom_ovino"         => $request->input("Nom_ovino"),
            "Fec_nacimiento"    => $request->input("Fec_nacimiento"),
            "Raza"              => $request->input("Raza"),
            "Sexo"              => $request->input("Sexo"),
            "Categoria"         => $request->input("Categoria"),
            "Motivo"            => $request->input("Motivo"),
            // "Peso_nacimiento"   => $request->input("Peso_nacimiento"),
            "Peso_actual"       => $request->input("Peso_actual"),
            // "Gdp"               => $request->input("Gdp"),
            "Id_responsable"    => $request->input("Id_responsable"),
            "Id_rebano"         => $request->input("Id_rebano")
        );

        if (!empty($datosOvino)) {
            $ovino = OvinoModel::insert($datosOvino);

            //Consultar el último registro de rebaño para obtener la cantidad del rebaño
            //Sumarle el que acaban de agregar
            //Crear nuevo registro en rebaño con la nueva cantidad
            return redirect("/ovino");
        }
    }

    public function ovinosparaAgregar(Request $request){
        $ovinos = OvinoModel::all();
            return $ovinos;
    }
}
