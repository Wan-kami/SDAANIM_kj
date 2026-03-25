<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $primaryKey = 'ins_id';
    protected $fillable = ['ins_documento', 'ins_nombre', 'ins_email', 'ins_direccion', 'ins_telefono', 'ins_tipo_rol', 'ins_especialidad', 'ins_experiencia_anos', 'ins_certificado', 'ins_tipo_ayuda', 'ins_comentario', 'ins_estado'];
}
