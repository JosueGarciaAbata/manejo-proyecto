<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PoliticalPartiesSeeder::class,
            CandidateSeeder::class,
            ProposalSeeder::class,
            VoterSeeder::class,
            SuggestionSeeder::class,
            EventsSeeder::class,
            IconSeeder::class,
            SocialLinkSeeder::class,
        ]);

        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
