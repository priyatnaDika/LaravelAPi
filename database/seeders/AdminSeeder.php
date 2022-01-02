<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Game;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
        [
            'name' => 'admin',
            'email' => 'admin@seeder.com',
            'email_verified_at'=>now(),
            'level' => 'admin',
            'password' => bcrypt('passwordadmin')
        ],
        [
            'name' => 'kasir',
            'email' => 'kasir@seeder.com',
            'email_verified_at'=>now(),
            'level' => 'kasir',
            'password' => bcrypt('passwordkasir')
        ]
    ];
    $kategori =[
        [
            'name_kategori' => 'Action'
        ],
        [
            'name_kategori' => 'RPG'
        ],
        [
            'name_kategori' => 'Adventure'
        ],
    ];
    $game =[
        [
            'name_game' => 'GTA V',
            'description' => 'Open World',
            'stock' => '200',
            'harga' => '200.000',
            'kategori_id' => 1

        ],
        [
            'name_game' => 'God Of War',
            'description' => 'Open World',
            'stock' => '120',
            'harga' => '250.000',
            'kategori_id' => 3

        ],
    ];

    foreach($kategori as $kategori){
        Kategori::create($kategori);
    }
    foreach($game as $game){
        Game::create($game);
    }
    foreach($user as $user){
        User::create($user);
    }

    }
}