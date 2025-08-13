<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ListarProductos extends Command
{
    protected $signature = 'inventario:listar';
    protected $description = 'Lista todos los productos del inventario';

    public function handle()
    {
        $headers = ['ID', 'Nombre', 'Descripción', 'Precio', 'Stock', 'Imagen'];
        
        $productos = Producto::select('id', 'nombre', 'descripcion', 'precio', 'stock', 'imagen')
            ->get()
            ->toArray();

        $this->table($headers, $productos);
        
        // Opcional: Mostrar resumen
        $this->info("\nResumen del inventario:");
        $this->line("Total productos: ".count($productos));
        $this->line("Stock total: ".array_sum(array_column($productos, 'stock')));
        $this->line("Valor total: $".number_format(array_sum(array_column($productos, 'precio')), 2));
    }
}