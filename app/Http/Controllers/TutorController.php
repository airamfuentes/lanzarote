<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Elementos\RadioButton;

class TutorController extends Controller {
    function listado() {
        $tutores = Tutor::paginate(10);
        return view('tutores.tutor', compact('tutores'));
    }
    function formulario($oper='', $id='') {
        $tutor = empty($id) ? new Tutor() : Tutor::find($id);
        $anhos = [];
        for ($i = 2018; $i <= 2025; $i++) $anhos[(string)$i] = (string)$i;
        $dis   = ($oper == 'cons' || $oper == 'supr');
        $radio = new RadioButton('antiguedad', $anhos, $tutor->antiguedad ?? '', $dis);
        return view('tutores.formulario', compact('tutor','oper','radio'));
    }
    function mostrar($id)    { return $this->formulario('cons', $id); }
    function actualizar($id) { return $this->formulario('modi', $id); }
    function eliminar($id)   { return $this->formulario('supr', $id); }
    function alta()          { return $this->formulario(); }
    function horario($id) {
        $tutor  = Tutor::find($id);
        $cursos = $tutor->cursos;
        return view('tutores.horario', compact('tutor','cursos'));
    }
    function almacenar(Request $request) {
        if ($request->oper == 'supr') {
            Tutor::find($request->id)->delete();
            return redirect()->route('tutores.listado');
        }
        $request->validate([
            'nombre'    => 'required',
            'email'     => 'required|email|unique:tutores,email,'.$request->id,
            'antiguedad'=> 'required',
        ]);
        $tutor = empty($request->id) ? new Tutor() : Tutor::find($request->id);
        $tutor->nombre     = $request->nombre;
        $tutor->email      = $request->email;
        $tutor->antiguedad = $request->antiguedad;
        $tutor->save();
        return redirect()->route('tutores.alta')->with('success','Tutor guardado.');
    }
}