<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $productos = [
            [
                'nombre' => 'Laptop Gamer ASUS',
                'descripcion' => 'Laptop potente con procesador Ryzen 7 y RTX 3060.',
                'precio' => 18999,
                'stock' => 10,
                'imagen' => 'laptop_asus.jpg'
            ],
            [
                'nombre' => 'Mouse Logitech G Pro',
                'descripcion' => 'Mouse inalámbrico de alto rendimiento para gamers.',
                'precio' => 1499,
                'stock' => 25,
                'imagen' => 'mouse_logitech.jpg'
            ],
            [
                'nombre' => 'Teclado Mecánico HyperX',
                'descripcion' => 'Teclado mecánico retroiluminado RGB para juegos.',
                'precio' => 1999,
                'stock' => 15,
                'imagen' => 'teclado_hyperx.jpg'
            ],
            [
                'nombre' => 'Monitor 27" Curvo Samsung',
                'descripcion' => 'Monitor curvo Full HD para una experiencia inmersiva.',
                'precio' => 5999,
                'stock' => 8,
                'imagen' => 'monitor_samsung.jpg'
            ],
            [
                'nombre' => 'Audífonos SteelSeries',
                'descripcion' => 'Auriculares con sonido envolvente y micrófono retráctil.',
                'precio' => 2499,
                'stock' => 20,
                'imagen' => 'audifonos_steelseries.jpg'
            ],
            [
                'nombre' => 'Silla Gamer Razer',
                'descripcion' => 'Silla ergonómica con soporte lumbar ajustable.',
                'precio' => 4999,
                'stock' => 5,
                'imagen' => 'silla_razer.jpg'
            ],
            [
                'nombre' => 'SSD NVMe 1TB',
                'descripcion' => 'Unidad de estado sólido ultrarrápida para gaming y trabajo.',
                'precio' => 1799,
                'stock' => 30,
                'imagen' => 'ssd_nvme.jpg'
            ],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
