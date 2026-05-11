<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model {
    const LETRAS = ['D' => 'Lomo Derecho', 'I' => 'Lomo Izquierdo'];
    const PLANTAS = ['Primera' => 'Primera', 'Segunda' => 'Segunda', 'Tercera' => 'Tercera'];
    protected $fillable = ['nombre', 'letra', 'numero', 'planta'];
}