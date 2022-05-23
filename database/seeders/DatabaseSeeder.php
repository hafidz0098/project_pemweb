<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Post;
use App\Models\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(3)->create();


        Status::create([
            'name' => 'Pending',
            'slug' => 'pending'
        ]);

        Status::create([
            'name' => 'Sukses',
            'slug' => 'sukses'
        ]);

        Status::create([
            'name' => 'Gagal',
            'slug' => 'gagal'
        ]);

        User::create([
            'name' => 'Hafidz',
            'username' => 'hafidz',
            'email' => 'hafidznak123@gmail.com',
            'password' => Hash::make('12345')
        ]);
        

        // Post::factory(20)->create();
    }
}
