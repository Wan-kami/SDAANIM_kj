<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'Tar_id';
    protected $fillable = ['Usu_documento', 'Tar_titulo', 'Tar_descripcion', 'Tar_fecha_asignacion', 'Tar_fecha_limite', 'Tar_estado', 'Tar_comentario'];
}
