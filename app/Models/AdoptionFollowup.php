<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionFollowup extends Model
{
    protected $primaryKey = 'Segui_id';
    protected $fillable = ['Soli_id', 'Segui_tipo', 'Segui_estado', 'Segui_descripcion', 'Segui_fecha'];
}
