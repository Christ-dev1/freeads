<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{

    $categories = ['Architecture', 'Personnages', 'Loisirs', 'Électronique', 'Véhicules'];
    foreach ($categories as $name) {
        \App\Models\Category::create(['name' => $name]);
    }
    $allCats = \App\Models\Category::all();


    $admins = [
        ['name' => 'Abou Maniga', 'email' => 'aboum084@gmail.com'],
        ['name' => 'Kadjo Christ', 'email' => 'kadjoblin20@gmail.com'],
        ['name' => 'Kouame Ephraim', 'email' => 'kouame.koffiephraim@gmail.com'],
    ];

    foreach ($admins as $adminData) {

        $user = \App\Models\User::factory()->create([
            'name' => $adminData['name'],
            'email' => $adminData['email'],
            'password' => bcrypt('password'), 
        ]);


        \App\Models\Ad::factory(6)->create([
            'user_id' => $user->id,
            'category_id' => $allCats->random()->id,
        ]);
    }



    $randomUsers = \App\Models\User::factory(5)->create();


    \App\Models\Ad::factory(15)->create([
        'user_id' => $randomUsers->random()->id,
        'category_id' => $allCats->random()->id,
    ]);
}

}
