<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ListarUsuarios extends Command
{
    protected $signature = 'usuarios:listar';
    protected $description = 'Lista todos los usuarios registrados en el sistema';

    public function handle()
    {
        $headers = ['ID', 'Nombre', 'Email', 'Fecha Registro'];
        
        $usuarios = User::select('id', 'name', 'email', 'created_at')
            ->get()
            ->map(function($user) {
                return [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->created_at->format('d/m/Y H:i:s')
                ];
            })
            ->toArray();

        $this->table($headers, $usuarios);
        
        $this->info("\nResumen:");
        $this->line("Total usuarios: ".count($usuarios));
        $this->line("Último registro: ".end($usuarios)[3]);
    }
}