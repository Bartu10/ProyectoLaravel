<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'nick' => 'admin',
            'email' => 'admin@admin.es',
            'password' => bcrypt('admin')
        ]);

        $user = \App\Models\User::factory()->create();
        $images = \App\Models\Imagen::factory(4)->for($user)->create();
        foreach($images as $image){
        $numL = rand(0,20);
        \App\Models\Like::factory($numL)->for($image)->for($user)->create();
        \App\Models\Comentario::factory(4)->for($image)->for($user)->create();
    }
}
}
