<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
        $user = User::create([
            'name' => 'pepe',
            'username' => 'PepeSR',
            'email' => 'pepe@itera.com',
            'password' => bcrypt('123456789')
        ]);
        $user2 = User::create([
            'name' => 'lenia',
            'username' => 'Lenia María',
            'email' => 'lenia@itera.com',
            'password' => bcrypt('123456789')
        ]);
        $user->pictures()->createMany([
            ['picture_url' => 'https://picsum.photos/400/300?random=1', 'title' => 'Imagen 1', 'description' => 'Descripción 1'],
            ['picture_url' => 'https://picsum.photos/400/600?random=2', 'title' => 'Imagen 2', 'description' => 'Descripción 2'],
            ['picture_url' => 'https://picsum.photos/400/200?random=3', 'title' => 'Imagen 3', 'description' => 'Descripción 3'],
            ['picture_url' => 'https://picsum.photos/400/500?random=4', 'title' => 'Imagen 4', 'description' => 'Descripción 4'],
            ['picture_url' => 'https://picsum.photos/400/350?random=5', 'title' => 'Imagen 5', 'description' => 'Descripción 5'],
            ['picture_url' => 'https://picsum.photos/400/200?random=3', 'title' => 'Imagen 3', 'description' => 'Descripción 3'],
            ['picture_url' => 'https://picsum.photos/400/500?random=4', 'title' => 'Imagen 4', 'description' => 'Descripción 4'],
            ['picture_url' => 'https://picsum.photos/400/350?random=5', 'title' => 'Imagen 5', 'description' => 'Descripción 5'],


        ]);
        $user2->pictures()->createMany([
            ['picture_url' => 'https://picsum.photos/400/300?random=1', 'title' => 'Imagen 1', 'description' => 'Descripción 1'],
            ['picture_url' => 'https://picsum.photos/400/600?random=2', 'title' => 'Imagen 2', 'description' => 'Descripción 2'],
            ['picture_url' => 'https://picsum.photos/400/200?random=3', 'title' => 'Imagen 3', 'description' => 'Descripción 3'],
            ['picture_url' => 'https://picsum.photos/400/500?random=4', 'title' => 'Imagen 4', 'description' => 'Descripción 4'],
            ['picture_url' => 'https://picsum.photos/400/350?random=5', 'title' => 'Imagen 5', 'description' => 'Descripción 5'],
            ['picture_url' => 'https://picsum.photos/400/200?random=3', 'title' => 'Imagen 3', 'description' => 'Descripción 3'],
            ['picture_url' => 'https://picsum.photos/400/500?random=4', 'title' => 'Imagen 4', 'description' => 'Descripción 4'],
            ['picture_url' => 'https://picsum.photos/400/350?random=5', 'title' => 'Imagen 5', 'description' => 'Descripción 5'],

        ]);
    }
}
