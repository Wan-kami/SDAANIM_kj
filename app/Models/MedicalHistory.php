<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $primaryKey = 'Hist_id';
    protected $fillable = ['Anim_id', 'Hist_fecha', 'Hist_diagnostico', 'Hist_tratamiento', 'Hist_observaciones'];
}
