<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aula;

class AulaController extends Controller {
    function listado() {
        $aulas = Aula::paginate(10);
        $LETRAS = Aula::LETRAS;
        $PLANTAS = Aula::PLANTAS;
        return view('aulas.aula', compact('aulas','LETRAS','PLANTAS'));
    }
    function formulario($oper='', $id='') {
        $aula = empty($id) ? new Aula() : Aula::find($id);
        $LETRAS = Aula::LETRAS;
        $PLANTAS = Aula::PLANTAS;
        return view('aulas.formulario', compact('aula','oper','LETRAS','PLANTAS'));
    }
    function mostrar($id)   { return $this->formulario('cons', $id); }
    function actualizar($id){ return $this->formulario('modi', $id); }
    function eliminar($id)  { return $this->formulario('supr', $id); }
    function alta()         { return $this->formulario(); }
    function almacenar(Request $request) {
        if ($request->oper == 'supr') {
            Aula::find($request->id)->delete();
            return redirect()->route('aulas.listado');
        }
        $request->validate([
            'nombre' => 'required',
            'letra'  => 'required|in:D,I',
            'numero' => 'required|integer|unique:aulas,numero,'.$request->id,
            'planta' => 'required|in:Primera,Segunda,Tercera',
        ]);
        $aula = empty($request->id) ? new Aula() : Aula::find($request->id);
        $aula->nombre = $request->nombre;
        $aula->letra  = $request->letra;
        $aula->numero = $request->numero;
        $aula->planta = $request->planta;
        $aula->save();
        return redirect()->route('aulas.alta')->with('success','Aula guardada.');
    }
}