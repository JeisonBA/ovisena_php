<?php

namespace App\Http\Controllers;

use App\Models\ResponsableModel;
use App\Models\OvinoModel;
use App\Models\RebanoModel;
use Illuminate\Http\Request;
use App\Models\SanidadModel;

class SanidadController extends Controller
{
    //
    public function index()
    {
        $sanidad = SanidadModel::all();

        return view("paginas.sanidad");
    }

    public function show($Id_sanidad)
    {
        $sanidad = SanidadModel::where('Id_sanidad', $Id_sanidad)->get();
        if (count($sanidad) != 0) {

            $ovino = OvinoModel::all();
            $rebano = RebanoModel::all();
            $responsable = ResponsableModel::all();

            return view("paginas.editarSanidad", array("sanidas" => $sanidad, 'datosOvino' => $ovino, 'datosRebano' => $rebano, 'datosResponsable' => $responsable));
        } else {
            return view("paginas.editarSanidad", array("status" => 404));
        }
    }

    //Funcion para el boton buscar
    public function buscarSanidad($textoSanidad, Request $request)
    {
        if ($request->ajax()) {

            if ($textoSanidad == "-") {
                //Primero consultar todos y dependiendo de la relación ir consultando con el join
                $sanidad = SanidadModel::all();

                foreach ($sanidad as $key => $elemento) {

                    if ($elemento->rebano) {

                        $sanidad[$key]['Nom_ovino'] = 'No Aplica'; //Si existe relación con el rebano quiere decir que no hay nombre de ovino
                        $sanidad[$key]['Nom_rebano'] = $elemento->rebano['Nom_rebano'];
                    } else {
                        //Si no existe relacion con rebano quiere decir que hay relación con ovino
                        //Y que si existe el Nom_ovino
                        $sanidad[$key]['Nom_rebano'] = 'No Aplica';
                        $sanidad[$key]['Nom_ovino'] = $elemento->ovino['Nom_ovino'];
                    }

                    $sanidad[$key]['Nom_responsable'] = $elemento->responsable['Nom_responsable'];
                }

                // if(count($sanidad) == 0){
                //     $sanidad = SanidadModel::join('ovino', 'sanidad.Id_ovino', '=', 'ovino.Id_ovino')->get();
                // }
                return $sanidad;
            } else {
                //Consultar todo sin JOIN solamente con orWhere
                //Después el foreach y las condicionales IF
                $sanidad = SanidadModel::where('sanidad.Tipo', 'like', '%' . $textoSanidad . '%')
                    ->orWhere('sanidad.Medicamento', 'like', '%' . $textoSanidad . '%')
                    ->orWhere('sanidad.Descripcion', 'like', '%' . $textoSanidad . '%')
                    ->orWhere('Nom_responsable', 'like', '%' . $textoSanidad . '%')
                    ->join('responsable', 'sanidad.Id_responsable', '=', 'responsable.Id_responsable')
                    ->select(
                        'sanidad.Id_sanidad as Id_sanidad',
                        'sanidad.Fecha as Fecha',
                        'sanidad.Tipo as Tipo',
                        'sanidad.Medicamento as Medicamento',
                        'sanidad.Descripcion as Descripcion',
                        'sanidad.Id_responsable as Id_responsable',
                        'sanidad.Id_ovino as Id_ovino',
                        'sanidad.Id_rebano as Id_rebano'
                    )->get();

                foreach ($sanidad as $key => $elemento) {

                    if ($elemento->rebano) {

                        $sanidad[$key]['Nom_ovino'] = 'No aplica';
                        $sanidad[$key]['Nom_rebano'] = $elemento->rebano['Nom_rebano'];
                    } else {

                        $sanidad[$key]['Nom_rebano'] = 'No Aplica';
                        $sanidad[$key]['Nom_ovino'] = $elemento->ovino['Nom_ovino'];
                    }
                    $sanidad[$key]['Nom_responsable'] = $elemento->responsable['Nom_responsable'];
                }
                return $sanidad;
            }
        }
    }

    //Funcion para el boton actualizar
    public function update($Id_sanidad, Request $request)
    {

        $datosSanidad = array(
            'Fecha'          => $request->input('Fecha'),
            'Tipo'           => $request->input('Tipo'),
            'Medicamento'    => $request->input('Medicamento'),
            'Descripcion'    => $request->input('Descripcion'),
            'Id_responsable' => $request->input('responsable'),
            'Id_ovino'       => $request->input('ovino'),
            'Id_rebano'      => $request->input('rebano')

        );

        if (!empty($datosSanidad)) {
            $sanidad = SanidadModel::where('Id_sanidad', $Id_sanidad)->update($datosSanidad);
            return redirect("/sanidad");
        }
    }

    //Funcion para el boton eliminar
    public function destroy($Id_sanidad)
    {
        return $sanidad = SanidadModel::where("Id_sanidad", $Id_sanidad)->delete();
    }

    //Funcion para el boton agregar
    public function agregar()
    {

        $sanidad = SanidadModel::all();
        $ovino = OvinoModel::all();
        $rebano = RebanoModel::all();
        $responsable = ResponsableModel::all();

        return view('paginas.agregarSanidad', array('sanidad' => $sanidad, 'datosOvino' => $ovino, 'datosRebano' => $rebano, 'datosResponsable' => $responsable));
    }
    //Funcion para el boton agregar-2
    public function store(Request $request)
    {
        $datosSanidad = array(
            "Fecha"          => $request->input("Fecha"),
            "Tipo"           => $request->input("Tipo"),
            "Medicamento"    => $request->input("Medicamento"),
            "Descripcion"    => $request->input("Descripcion"),
            "Id_responsable" => $request->input("Id_responsable"),
            "Id_ovino"       => $request->input("Id_ovino"),
            "Id_rebano"      => $request->input("Id_rebano")
        );

        if (!empty($datosSanidad)) {
            $sanidad = SanidadModel::insert($datosSanidad);
            return redirect("/sanidad");
        }
    }
}
