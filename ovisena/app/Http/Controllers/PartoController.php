<?php

namespace App\Http\Controllers;

use App\Models\OvinoModel;
use Illuminate\Http\Request;
use App\Models\PartoModel;

class PartoController extends Controller
{
    //
    public function index(){
        $parto = PartoModel::all();

        return view("paginas.parto");
    }

    public function show($Id_parto){
        $parto = PartoModel::where('Id_parto', $Id_parto)->get();
        if(count($parto) != 0){

            $ovino = OvinoModel::all();

            return view("paginas.editarParto", array("partos" => $parto, 'datosOvino' => $ovino));
        }else{
            return view("paginas.editarParto", array("status" => 404));
        }
    }

    //Funcion para el boton buscar
    public function buscarParto($textoParto, Request $request){
        if($request->ajax()){

            if($textoParto == "-"){
                $parto = PartoModel::join('ovino as madre', 'parto.Id_madre', '=', 'madre.Id_ovino')
                ->join('ovino as padre', 'parto.Id_padre', '=', 'padre.Id_ovino')
                ->select(
                    'parto.Id_parto as Id_parto',
                    'parto.Fecha as Fecha',
                    'parto.Tipo as Tipo',
                    'parto.Descripcion as Descripcion',
                    'madre.Nom_ovino as Nombre_madre',
                    'padre.Nom_ovino as Nombre_padre')->get();
                return $parto;

            }else{
                $parto = PartoModel::join('ovino as madre', 'parto.Id_madre', '=', 'madre.Id_ovino')
                ->join('ovino as padre', 'parto.Id_padre', '=', 'padre.Id_ovino')
                ->orWhere('Tipo', 'like', '%'.$textoParto.'%')
                ->orWhere('madre.Nom_ovino', 'like', '%'.$textoParto.'%')
                ->orWhere('padre.Nom_ovino', 'like', '%'.$textoParto.'%')
                ->select(
                    'parto.Id_parto as Id_parto',
                    'parto.Fecha as Fecha',
                    'parto.Tipo as Tipo',
                    'parto.Descripcion as Descripcion',
                    'madre.Nom_ovino as Nombre_madre',
                    'padre.Nom_ovino as Nombre_padre')->get();
                return $parto;
            }
        }
    }

    //Funcion para el boton actualizar
    public function update($Id_parto, Request $request){

        $datosParto = array(
            'Fecha'       => $request->input('Fecha'),
            'Tipo'        => $request->input('Tipo'),
            'Descripcion' => $request->input('Descripcion'),
            'Id_madre'    => $request->input('Id_madre'),
            'Id_padre'    => $request->input('Id_padre')
        );

        if(!empty($datosParto)){
        $parto = PartoModel::where('Id_parto', $Id_parto)->update($datosParto);
        return redirect("/parto");
        }
    }

    //Funcion para el boton eliminar
    public function destroy($Id_parto){
        
        return $parto = PartoModel::where("Id_parto", $Id_parto)->delete();
    }

    //Funcion para el boton agregar
    public function agregar(){

        $parto = PartoModel::all();
        $ovino = OvinoModel::all();

        return view('paginas.agregarParto', array('parto' => $parto, 'datosOvino' => $ovino));
    }
    //Funcion para el boton agregar-2
    public function store(Request $request){
        $datosParto = array(
            "Fecha"         => $request->input("Fecha"),
            "Tipo"          => $request->input("Tipo"),
            "Descripcion"   => $request->input("Descripcion"),
            "Id_madre"      => $request->input("Id_madre"),
            "Id_padre"      => $request->input("Id_padre")
        );

        if(!empty($datosParto)){
            $parto = PartoModel::insert($datosParto);
            return redirect("/parto");
        }
    }
}
