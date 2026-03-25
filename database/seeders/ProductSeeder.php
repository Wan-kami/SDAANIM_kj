<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::updateOrCreate(['prod_nombre' => 'Collar Ajustable'], [
            'prod_categoria' => 'Accesorios',
            'prod_precio' => 15000,
            'prod_cantidad' => 20,
            'prod_imagen' => 'collar.jpg',
        ]);

        Product::updateOrCreate(['prod_nombre' => 'Alimento Premium 1kg'], [
            'prod_categoria' => 'Alimentos',
            'prod_precio' => 12000,
            'prod_cantidad' => 50,
            'prod_imagen' => 'alimento.jpg',
        ]);
        
        Product::updateOrCreate(['prod_nombre' => 'Pelota de Goma'], [
            'prod_categoria' => 'Juguetes',
            'prod_precio' => 5000,
            'prod_cantidad' => 15,
            'prod_imagen' => 'pelota.jpg',
        ]);
    }
}
