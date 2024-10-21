<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateAndSeedCommand extends Command
{
    protected $signature = 'db:migrate-seed'; // Nombre del comando

    protected $description = 'Run database migrations and seed the database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Ejecutar migraciones
        $this->info('Running migrations...');

        try {
            $migrationResult = Artisan::call('migrate', ['--force' => true]); // Ejecutar las migraciones

            if ($migrationResult === 0) { // Si las migraciones se ejecutaron con éxito (retorna 0)
                // Ejecutar seeders
                $this->info('Running seeders...');
                Artisan::call('db:seed', ['--force' => true]);

                $this->info('Database migrated and seeded successfully!');
            } else {
                $this->error('Migration failed, seeders were not executed.');
            }
        } catch (\Exception $e) {
            $this->error('An error occurred during the migration: ' . $e->getMessage());
        }
    }

}