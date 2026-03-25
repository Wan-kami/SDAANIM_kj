<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $primaryKey = 'Anim_id';
    protected $fillable = ['Anim_nombre', 'Anim_raza', 'Anim_edad', 'Anim_estado', 'Anim_foto', 'Anim_historia', 'Anim_sexo'];

    public function medicalHistories()
    {
        return $this->hasMany(MedicalHistory::class, 'Anim_id', 'Anim_id');
    }

    public function adoptionRequests()
    {
        return $this->hasMany(AdoptionRequest::class, 'Anim_id', 'Anim_id');
    }
}
