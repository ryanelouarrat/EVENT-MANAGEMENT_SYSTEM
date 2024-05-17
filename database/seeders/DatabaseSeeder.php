<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Events;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    $user = User::factory()->create([
        'nom' => 'Miss Ressie Jacobi DVM', // Adjust these lines
        'prenom' => 'lschuster@example.org',
        'ClubName' => 'YourClubName',
        'Categorie' => 'YourCategory',
        'Description' => 'YourDescription',
        'email' => 'lschuster@example.org',
        'password' => bcrypt('rayN'), // Replace 'your_password' with the desired password
    ]);

    Events::factory(6)->create([
        'user_id' => $user->id,
    ]);
}
}
