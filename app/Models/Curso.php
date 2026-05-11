<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model {
    protected $table    = 'cursos';
    protected $fillable = ['nombre','id_tutor'];

    public function tutor() {
        return $this->belongsTo(Tutor::class, 'id_tutor');
    }
}