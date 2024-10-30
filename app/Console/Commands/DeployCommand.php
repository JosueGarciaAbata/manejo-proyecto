<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DeployCommand extends Command
{
    protected $signature = 'deploy'; // Nombre del comando

    protected $description = 'Deploy the application by migrating the database, seeding, and serving the application';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Ejecutar migraciones
        $this->info('Running migrations...');

        try {
            // Ejecutar migraciones
            $migrationResult = Artisan::call('migrate', ['--force' => true]);

            if ($migrationResult === 0) { // Si las migraciones se ejecutaron con éxito
                // Ejecutar seeders
                $this->info('Running seeders...');
                $seederResult = Artisan::call('db:seed', ['--force' => true]);

                if ($seederResult === 0) { // Si los seeders se ejecutaron con éxito
                    $this->info('Database migrated and seeded successfully!');

                    // Limpiar la consola (intentar limpiar la pantalla)
                    $this->info("\nClearing the console...\n");
                    $this->call('clear');

                    // Iniciar el servidor
                    $this->info('Starting the application...');
                    

                    // Obtener el host y el puerto de configuración
                    $host = config('app.url') ?: 'http://localhost';
                    $port = env('PORT', 8000); // Obtener el puerto de la variable de entorno o usar 8000 por defecto

                    // Imprimir el enlace de forma destacada
                    $this->line("Application is now running on: \033[32m{$host}:{$port}\033[0m"); // Verde
                    $this->line('You can click the link above to open it in your browser (may require copying).');
                    Artisan::call('serve');
                } else {
                    $this->error('Seeding failed. Please check your seeders.');
                }
            } else {
                $this->error('Migration failed. Please check your migrations.');
            }
        } catch (\Exception $e) {
            $this->error('An error occurred during the deployment: ' . $e->getMessage());
        }
    }
}
