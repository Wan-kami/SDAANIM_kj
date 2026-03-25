<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run()
    {
        Animal::updateOrCreate(['Anim_nombre' => 'Luna'], [
            'Anim_raza' => 'Labrador',
            'Anim_edad' => '2 años',
            'Anim_sexo' => 'Hembra',
            'Anim_estado' => 'Disponible',
            'Anim_historia' => 'Rescatada de un parque, muy juguetona.',
            'Anim_foto' => 'image1.jpg'
        ]);

        Animal::updateOrCreate(['Anim_nombre' => 'Max'], [
            'Anim_raza' => 'Pastor Alemán',
            'Anim_edad' => '4 años',
            'Anim_sexo' => 'Macho',
            'Anim_estado' => 'Disponible',
            'Anim_historia' => 'Leal y protector, ideal para familias.',
            'Anim_foto' => 'image2.jpg'
        ]);

        Animal::updateOrCreate(['Anim_nombre' => 'Bella'], [
            'Anim_raza' => 'Criolla',
            'Anim_edad' => '1 año',
            'Anim_sexo' => 'Hembra',
            'Anim_estado' => 'Disponible',
            'Anim_historia' => 'Muy tranquila y cariñosa.',
            'Anim_foto' => 'image3.jpg'
        ]);
        
        Animal::updateOrCreate(['Anim_nombre' => 'Toby'], [
            'Anim_raza' => 'Beagle',
            'Anim_edad' => '6 meses',
            'Anim_sexo' => 'Macho',
            'Anim_estado' => 'Disponible',
            'Anim_historia' => 'Un cachorro lleno de energía.',
            'Anim_foto' => 'image4.jpg'
        ]);
    }
}
